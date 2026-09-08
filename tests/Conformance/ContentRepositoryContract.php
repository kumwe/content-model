<?php

declare(strict_types=1);

namespace Kumwe\Content\Tests\Conformance;

use DateTimeImmutable;
use Kumwe\Context\Value\SiteContext;
use Kumwe\Content\Application\ContentBrowseQuery;
use Kumwe\Content\Application\ContentModelRepository;
use Kumwe\Content\Application\ContentRecord;
use Kumwe\Content\Application\ContentSearchRepository;
use Kumwe\Content\Application\SiteScopedContentRepository;
use Kumwe\Content\Application\TranslationGroupRepository;
use Kumwe\Content\Domain\ContentEntry;
use Kumwe\Content\Domain\ContentRevision;
use Kumwe\Content\Domain\ContentTypeDefinition;
use Kumwe\Content\Domain\InvalidTranslationGroup;
use Kumwe\Content\Domain\PublicationWindow;
use Kumwe\Content\Domain\VersionConflict;
use Kumwe\Content\Workflow\Domain\WorkflowDefinition;
use Kumwe\Content\Workflow\Domain\WorkflowStateDefinition;
use Kumwe\Localization\Domain\LocaleTag;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RuntimeException;

/** Subclasses provide isolated adapters sharing the same stored records; all checks are sequential. */
abstract class ContentRepositoryContract extends TestCase
{
    abstract protected function content(): SiteScopedContentRepository&ContentSearchRepository;
    abstract protected function model(): ContentModelRepository;
    abstract protected function translations(): TranslationGroupRepository;

    protected function id(int $id): string
    {
        return sprintf('018f22e2-7c8b-7ab0-8f3a-%012d', $id);
    }
    protected function site(string $id = 'alpha'): SiteContext
    {
        return SiteContext::fromString($id);
    }
    protected function at(string $modifier = '+0 seconds'): DateTimeImmutable
    {
        return (new DateTimeImmutable('2026-09-08T12:00:00Z'))->modify($modifier);
    }
    protected function workflow(int $id = 100, int $version = 1, string $site = 'alpha', bool $visiblePublic = true): WorkflowDefinition
    {
        return new WorkflowDefinition(
            $this->id($id),
            $this->site($site),
            'flow-' . $id,
            'Editorial',
            [new WorkflowStateDefinition('draft', 'Draft', initial: true), new WorkflowStateDefinition('visible', 'Visible', public: $visiblePublic)],
            [],
            $version,
            $this->at(),
            $this->at()
        );
    }
    protected function type(int $id = 200, int $version = 1, string $site = 'alpha'): ContentTypeDefinition
    {
        return new ContentTypeDefinition(
            $this->id($id),
            $this->site($site),
            'type-' . $id,
            'Article ' . $version,
            $this->id(100),
            1,
            ['type' => 'object', 'title' => 'Schema ' . $version],
            $version,
            $this->at(),
            $this->at()
        );
    }
    protected function record(
        int $id,
        string $site = 'alpha',
        string $slug = 'article',
        string $state = 'visible',
        int $version = 1,
        ?PublicationWindow $window = null,
        ?string $locale = null,
        ?int $group = null,
        string $title = 'Article',
        int $type = 200,
        int $workflowVersion = 1,
        string $updated = '+0 seconds'
    ): ContentRecord {
        return new ContentRecord(
            ContentEntry::reconstitute(
                $this->id($id),
                $title,
                $slug,
                ['body' => 'Original'],
                $state,
                $window ?? PublicationWindow::unbounded(),
                $version,
                $locale,
                $group === null ? null : $this->id($group)
            ),
            $this->id($type),
            $this->id(100),
            $this->at(),
            $this->at($updated),
            null,
            1,
            $workflowVersion,
            $site
        );
    }

    public function testEmptyAndUnknownRepositoryResultsAreAbsent(): void
    {
        self::assertSame([], $this->content()->all());
        self::assertNull($this->content()->find($this->id(1)));
        self::assertNull($this->content()->findPublishedById($this->id(1), $this->at()));
        self::assertNull($this->content()->findPublishedBySlug('unknown', $this->at()));
        self::assertSame([], $this->content()->allForSite($this->site()));
        self::assertNull($this->content()->findForSite($this->site(), $this->id(1)));
        self::assertSame([], $this->content()->searchForSite($this->site(), new ContentBrowseQuery(), 10, 0));
        self::assertSame(1, $this->content()->nextRevisionNumber($this->id(1)));
        self::assertSame([], $this->model()->contentTypes($this->site()));
        self::assertSame([], $this->model()->workflows($this->site()));
        self::assertNull($this->model()->contentType($this->site(), 'missing'));
        self::assertNull($this->model()->workflow($this->site(), 'missing'));
        self::assertNull($this->translations()->forContent($this->site(), $this->id(1)));
    }

    public function testRecordRoundTripAndSiteIsolationApplyBeforePaging(): void
    {
        foreach ([$this->record(1), $this->record(2, site: 'beta'), $this->record(3, slug: 'third')] as $record) {
            $this->content()->insert($record);
        }
        self::assertSame($this->record(1)->toArray(), $this->content()->find($this->id(1))->toArray());
        self::assertCount(3, $this->content()->all());
        $all = $this->content()->allForSite($this->site());
        self::assertCount(2, $all);
        self::assertEquals([$all[1]], $this->content()->allForSite($this->site(), 1, offset: 1));
        self::assertSame([], $this->content()->allForSite($this->site(), 1, offset: 2));
        self::assertNull($this->content()->findForSite($this->site('beta'), $this->id(1), true));
        self::assertNull($this->content()->findForSite($this->site(), $this->id(2), true));
        self::assertEquals($this->content()->all(1, offset: 1), array_slice($this->content()->all(), 1, 1));
    }

    public function testPublicationUsesPinnedWorkflowAndHalfOpenWindowAndSite(): void
    {
        $this->model()->insertWorkflow($this->workflow());
        $this->model()->insertWorkflow($this->workflow(101, site: 'beta'));
        $window = new PublicationWindow($this->at(), $this->at('+1 hour'));
        $this->content()->insert($this->record(1, window: $window));
        $this->content()->insert($this->record(2, site: 'beta'));
        $this->content()->insert($this->record(3, slug: 'draft', state: 'draft'));
        $this->model()->publishWorkflow($this->workflow(version: 2, visiblePublic: false), 1);
        self::assertNull($this->content()->findPublishedById($this->id(1), $this->at('-1 microsecond')));
        self::assertNotNull($this->content()->findPublishedById($this->id(1), $this->at()));
        self::assertNotNull($this->content()->findPublishedBySlug('article', $this->at('+1 hour -1 microsecond')));
        self::assertNull($this->content()->findPublishedBySlug('article', $this->at('+1 hour')));
        self::assertNull($this->content()->findPublishedById($this->id(3), $this->at()));
        self::assertNull($this->content()->findPublishedByIdForSite($this->site('beta'), $this->id(1), $this->at()));
        self::assertSame($this->id(1), $this->content()->findPublishedBySlugForSite($this->site(), 'article', $this->at())->entry->id());
        self::assertNull($this->content()->findPublishedBySlugForSite($this->site('gamma'), 'article', $this->at()));
        $this->content()->insert($this->record(4, slug: 'new-version', workflowVersion: 2));
        self::assertNull($this->content()->findPublishedById($this->id(4), $this->at()));
    }

    public function testUpdateAndTrashRefuseStaleOrMissingVersionsAndPreserveHistory(): void
    {
        $this->model()->insertWorkflow($this->workflow());
        $this->content()->insert($this->record(1));
        $this->content()->appendRevision(ContentRevision::capture($this->id(300), $this->record(1)->entry, 1, $this->at()));
        $this->content()->update($this->record(1, version: 2, title: 'Revised'), 1);
        foreach (
            [fn () => $this->content()->update($this->record(1, version: 3), 1),
            fn () => $this->content()->update($this->record(99, version: 2), 1),
            fn () => $this->content()->setDeletedAt($this->id(1), 1, $this->at(), $this->at()),
            fn () => $this->content()->setDeletedAt($this->id(99), 1, null, $this->at())] as $write
        ) {
            try {
                $write();
                self::fail('Stale or missing content write accepted.');
            } catch (VersionConflict) {
                self::assertSame('Revised', $this->content()->find($this->id(1))->entry->title());
            }
        }
        $this->content()->setDeletedAt($this->id(1), 2, $this->at('+1 minute'), $this->at('+1 minute'));
        self::assertNull($this->content()->find($this->id(1)));
        self::assertSame([], $this->content()->all());
        self::assertSame([], $this->content()->allForSite($this->site()));
        self::assertCount(1, $this->content()->all(includeDeleted: true));
        self::assertCount(1, $this->content()->allForSite($this->site(), includeDeleted: true));
        self::assertNull($this->content()->findPublishedById($this->id(1), $this->at('+1 minute')));
        $deleted = $this->content()->findForSite($this->site(), $this->id(1), true);
        self::assertSame(['body' => 'Original'], $deleted->entry->data());
        self::assertSame(2, $this->content()->nextRevisionNumber($this->id(1)));
        $this->content()->setDeletedAt($this->id(1), $deleted->entry->version(), null, $this->at('+2 minutes'));
        self::assertSame('Revised', $this->content()->find($this->id(1))->entry->title());
        self::assertNull($this->content()->find($this->id(1))->deletedAt);
        self::assertEquals($this->at('+2 minutes'), $this->content()->find($this->id(1))->updatedAt);
    }

    public function testRevisionNumbersUseHighestStoredNumberPerEntry(): void
    {
        foreach ([1, 2] as $id) {
            $this->content()->insert($this->record($id, slug: 'entry-' . $id));
        }
        $this->content()->appendRevision(ContentRevision::capture($this->id(300), $this->record(1)->entry, 1, $this->at()));
        $this->content()->appendRevision(ContentRevision::capture($this->id(301), $this->record(1)->entry, 7, $this->at()));
        self::assertSame(8, $this->content()->nextRevisionNumber($this->id(1)));
        self::assertSame(1, $this->content()->nextRevisionNumber($this->id(2)));
        self::assertSame(1, $this->content()->find($this->id(1))->entry->version());
    }

    public function testDefinitionPublicationPreservesVersionHistoryAndRejectsStaleHeads(): void
    {
        foreach (['type', 'workflow'] as $kind) {
            $insert = $kind === 'type' ? 'insertContentType' : 'insertWorkflow';
            $publish = $kind === 'type' ? 'publishContentType' : 'publishWorkflow';
            $lookup = $kind === 'type' ? 'contentType' : 'workflow';
            $list = $kind === 'type' ? 'contentTypes' : 'workflows';
            $v1 = $this->$kind();
            $v2 = $this->$kind(version: 2);
            $this->model()->$insert($v1);
            $this->model()->$publish($v2, 1);
            self::assertSame($v1->toArray(), $this->model()->$lookup($this->site(), $v1->id, 1)->toArray());
            self::assertSame($v2->toArray(), $this->model()->$lookup($this->site(), $v1->handle)->toArray());
            self::assertNull($this->model()->$lookup($this->site(), $v1->id, 3));
            self::assertNull($this->model()->$lookup($this->site('beta'), $v1->id));
            self::assertSame([], $this->model()->$list($this->site('beta')));
            try {
                $this->model()->$publish($this->$kind(version: 3), 1);
                self::fail('Stale definition head accepted.');
            } catch (VersionConflict) {
                self::assertSame(2, $this->model()->$lookup($this->site(), $v1->id)->version);
            }
            try {
                $this->model()->$publish($this->$kind(id: 999, version: 2), 1);
                self::fail('Missing definition head accepted.');
            } catch (VersionConflict) {
                self::assertNull($this->model()->$lookup($this->site(), $this->id(999)));
            }
        }
    }

    public function testDefinitionListsUseHeadVersionsAndHandleOrder(): void
    {
        foreach (['type', 'workflow'] as $kind) {
            $insert = $kind === 'type' ? 'insertContentType' : 'insertWorkflow';
            $list = $kind === 'type' ? 'contentTypes' : 'workflows';
            foreach ([302, 301, 303] as $id) {
                $this->model()->$insert($this->$kind($id));
            }
            self::assertSame([$this->id(301), $this->id(302), $this->id(303)], array_column($this->model()->$list($this->site()), 'id'));
        }
    }

    #[DataProvider('searchQueries')]
    public function testSearchCombinesSiteFiltersSortingAndStorageWindow(ContentBrowseQuery $query, array $expected): void
    {
        foreach (
            [$this->record(1, title: 'Alpha', slug: 'alpha', state: 'draft', updated: '+3 minutes'),
            $this->record(2, title: 'Beta', slug: 'beta', type: 201, updated: '+1 minute'),
            $this->record(3, title: 'Gamma', slug: 'gamma', updated: '+2 minutes'),
            $this->record(4, site: 'beta', title: 'Foreign', slug: 'foreign')] as $record
        ) {
            $this->content()->insert($record);
        }
        $this->content()->setDeletedAt($this->id(3), 1, $this->at(), $this->at('+2 minutes'));
        $rows = $this->content()->searchForSite($this->site(), $query, 10, 0);
        self::assertSame(array_map($this->id(...), $expected), array_map(static fn (ContentRecord $r): string => $r->entry->id(), $rows));
        self::assertEquals(array_slice($rows, 1, 1), $this->content()->searchForSite($this->site(), $query, 1, 1));
        self::assertSame([], $this->content()->searchForSite($this->site(), $query, 10, 20));
    }

    public static function searchQueries(): iterable
    {
        yield 'active newest' => [new ContentBrowseQuery(), [1, 2]];
        yield 'active oldest' => [new ContentBrowseQuery(sort: 'updated_asc'), [2, 1]];
        yield 'title ascending all' => [new ContentBrowseQuery(scope: 'all', sort: 'title_asc'), [1, 2, 3]];
        yield 'title descending all' => [new ContentBrowseQuery(scope: 'all', sort: 'title_desc'), [3, 2, 1]];
        yield 'trash' => [new ContentBrowseQuery(scope: 'trashed'), [3]];
        yield 'state' => [new ContentBrowseQuery(status: 'draft'), [1]];
        yield 'text' => [new ContentBrowseQuery(search: 'Beta'), [2]];
        yield 'type' => [new ContentBrowseQuery(contentType: '018f22e2-7c8b-7ab0-8f3a-000000000201'), [2]];
        yield 'combined refusal' => [new ContentBrowseQuery(search: 'Beta', status: 'draft'), []];
    }

    public function testTranslationDeclarationIsSiteBoundAndFallbackCannotDrift(): void
    {
        $groups = $this->translations();
        $groups->declareGroup($this->site(), $this->id(500), LocaleTag::fromString('en'));
        $groups->declareGroup($this->site(), $this->id(500), LocaleTag::fromString('de'));
        foreach ([[$this->site(), LocaleTag::fromString('de')], [$this->site('beta'), null]] as [$site, $fallback]) {
            try {
                $groups->declareGroup($site, $this->id(500), LocaleTag::fromString('en'), $fallback);
                self::fail('Conflicting group declaration accepted.');
            } catch (InvalidTranslationGroup) {
                self::assertTrue(true);
            }
        }
        try {
            $groups->guardAttachment($this->site('beta'), $this->id(500), $this->id(1));
            self::fail('Foreign attachment accepted.');
        } catch (InvalidTranslationGroup) {
            self::assertTrue(true);
        }
        $this->expectException(RuntimeException::class);
        $groups->guardAttachment($this->site(), $this->id(999), $this->id(1));
    }

    public function testTranslationProjectionReadsSameRecordsAndPinnedWorkflow(): void
    {
        $this->model()->insertWorkflow($this->workflow());
        $this->translations()->declareGroup($this->site(), $this->id(500), LocaleTag::fromString('en'));
        $this->content()->insert($this->record(1, locale: 'en', group: 500));
        $this->content()->insert($this->record(2, slug: 'artikel', state: 'draft', locale: 'de', group: 500));
        $this->content()->insert($this->record(3, slug: 'ungrouped'));
        $this->model()->publishWorkflow($this->workflow(version: 2, visiblePublic: false), 1);
        $group = $this->translations()->forContent($this->site(), $this->id(1));
        self::assertSame('en', $group->fallbackLocale->toString());
        self::assertCount(2, $group->members());
        self::assertCount(1, $group->publishedMembers($this->at()));
        self::assertSame($this->id(1), $group->resolve(LocaleTag::fromString('de'), $this->at())->contentId);
        self::assertNull($this->translations()->forContent($this->site('beta'), $this->id(1)));
        self::assertNull($this->translations()->forContent($this->site(), $this->id(3)));
        $this->content()->setDeletedAt($this->id(2), 1, $this->at(), $this->at());
        self::assertCount(1, $this->translations()->forContent($this->site(), $this->id(1))->members());
    }

    public function testAttachmentLimitExcludesExistingMemberAndDeletedRows(): void
    {
        $this->translations()->declareGroup($this->site(), $this->id(500), LocaleTag::fromString('en'));
        for ($id = 1; $id <= 64; ++$id) {
            $this->translations()->guardAttachment($this->site(), $this->id(500), $this->id($id));
            $this->content()->insert($this->record($id, slug: 'entry-' . $id, locale: sprintf('en-%03d', $id), group: 500));
        }
        $this->translations()->guardAttachment($this->site(), $this->id(500), $this->id(1));
        try {
            $this->translations()->guardAttachment($this->site(), $this->id(500), $this->id(65));
            self::fail('65th live member accepted.');
        } catch (InvalidTranslationGroup) {
            self::assertCount(64, $this->content()->allForSite($this->site()));
        }
        $this->content()->setDeletedAt($this->id(64), 1, $this->at(), $this->at());
        $this->translations()->guardAttachment($this->site(), $this->id(500), $this->id(65));
        self::assertCount(63, $this->content()->allForSite($this->site()));
    }
}
