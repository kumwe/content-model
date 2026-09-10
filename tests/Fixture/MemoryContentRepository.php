<?php

declare(strict_types=1);

namespace Kumwe\Content\Tests\Fixture;

use DateTimeImmutable;
use InvalidArgumentException;
use RuntimeException;
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
use Kumwe\Content\Domain\TranslationGroup;
use Kumwe\Content\Domain\TranslationGroupMember;
use Kumwe\Content\Domain\VersionConflict;
use Kumwe\Content\Workflow\Domain\WorkflowDefinition;
use Kumwe\Localization\Domain\LocaleTag;

/** Test-only sequential port oracle. No persistence, authorization, clock or transaction services. */
final class MemoryContentRepository implements SiteScopedContentRepository, ContentSearchRepository, ContentModelRepository, TranslationGroupRepository
{
    private array $records = [];
    private array $revisions = [];
    private array $types = [];
    private array $workflows = [];
    private array $groups = [];

    public function all(int $limit = 100, bool $includeDeleted = false, int $offset = 0): array
    {
        return array_slice(array_values(array_filter(
            $this->records,
            static fn (ContentRecord $r): bool => $includeDeleted || $r->deletedAt === null
        )), $offset, $limit);
    }

    public function find(string $id, bool $includeDeleted = false): ?ContentRecord
    {
        $record = $this->records[$id] ?? null;
        return $record !== null && ($includeDeleted || $record->deletedAt === null) ? $record : null;
    }

    private function published(?ContentRecord $record, DateTimeImmutable $time): ?ContentRecord
    {
        if ($record === null || $record->deletedAt !== null) {
            return null;
        }
        $workflow = $this->workflow(SiteContext::fromString($record->siteIdentifier), $record->workflowId, $record->workflowVersion);
        return $workflow !== null && $workflow->isPublic($record->entry->statusKey())
            && $record->entry->publicationWindow()->contains($time) ? $record : null;
    }

    public function findPublishedById(string $id, DateTimeImmutable $time): ?ContentRecord
    {
        return $this->published($this->find($id), $time);
    }

    public function findPublishedBySlug(string $slug, DateTimeImmutable $time): ?ContentRecord
    {
        foreach ($this->all(PHP_INT_MAX) as $record) {
            if ($record->entry->slug() === $slug && $this->published($record, $time) !== null) {
                return $record;
            }
        }
        return null;
    }

    public function insert(ContentRecord $record): void
    {
        if (isset($this->records[$record->entry->id()])) {
            throw new InvalidArgumentException('Duplicate content.');
        }
        $this->records[$record->entry->id()] = $record;
    }

    public function update(ContentRecord $record, int $expectedVersion): void
    {
        $this->requireVersion($this->find($record->entry->id(), true)?->entry->version(), $expectedVersion);
        $this->records[$record->entry->id()] = $record;
    }

    public function adopt(ContentRecord $record, int $expectedVersion): void
    {
        $stored = $this->find($record->entry->id());
        $this->requireVersion($stored?->entry->version(), $expectedVersion);
        $this->records[$record->entry->id()] = new ContentRecord(
            $stored->entry,
            $record->contentTypeId,
            $record->workflowId,
            $stored->createdAt,
            $record->updatedAt,
            $stored->deletedAt,
            $record->contentTypeVersion,
            $record->workflowVersion,
            $stored->siteIdentifier
        );
    }

    public function setDeletedAt(string $id, int $expectedVersion, ?DateTimeImmutable $deletedAt, DateTimeImmutable $updatedAt): void
    {
        $record = $this->find($id, true);
        $this->requireVersion($record?->entry->version(), $expectedVersion);
        $entry = $record->entry;
        $next = ContentEntry::reconstitute(
            $entry->id(),
            $entry->title(),
            $entry->slug(),
            $entry->data(),
            $entry->statusKey(),
            $entry->publicationWindow(),
            $entry->version() + 1,
            $entry->locale(),
            $entry->translationGroupId()
        );
        $this->records[$id] = $record->withEntry($next, $updatedAt)->withDeletedAt($deletedAt, $updatedAt);
    }

    public function appendRevision(ContentRevision $revision): void
    {
        $id = $revision->contentEntryId();
        $number = $revision->revisionNumber();
        if (isset($this->revisions[$id][$number])) {
            throw new InvalidArgumentException('Duplicate revision.');
        }
        $this->revisions[$id][$number] = $revision;
    }

    public function nextRevisionNumber(string $contentEntryId): int
    {
        return isset($this->revisions[$contentEntryId]) ? max(array_keys($this->revisions[$contentEntryId])) + 1 : 1;
    }

    public function allForSite(SiteContext $site, int $limit = 100, bool $includeDeleted = false, int $offset = 0): array
    {
        return array_slice(array_values(array_filter(
            $this->all(PHP_INT_MAX, $includeDeleted),
            static fn (ContentRecord $r): bool => $r->siteIdentifier === $site->identifier()
        )), $offset, $limit);
    }

    public function findForSite(SiteContext $site, string $id, bool $includeDeleted = false): ?ContentRecord
    {
        $record = $this->find($id, $includeDeleted);
        return $record?->siteIdentifier === $site->identifier() ? $record : null;
    }

    public function findPublishedByIdForSite(SiteContext $site, string $id, DateTimeImmutable $time): ?ContentRecord
    {
        return $this->published($this->findForSite($site, $id), $time);
    }

    public function findPublishedBySlugForSite(SiteContext $site, string $slug, DateTimeImmutable $time): ?ContentRecord
    {
        foreach ($this->allForSite($site, PHP_INT_MAX) as $record) {
            if ($record->entry->slug() === $slug && $this->published($record, $time) !== null) {
                return $record;
            }
        }
        return null;
    }

    public function searchForSite(SiteContext $site, ContentBrowseQuery $query, int $limit, int $offset): array
    {
        $records = array_values(array_filter(
            $this->allForSite($site, PHP_INT_MAX, true),
            static fn (ContentRecord $r): bool => ($query->scope === 'all' || (($r->deletedAt === null) === ($query->scope === 'active')))
                && ($query->status === '' || $query->status === $r->entry->statusKey())
                && ($query->contentType === '' || $query->contentType === $r->contentTypeId)
                && ($query->search === '' || mb_stripos($r->entry->title(), $query->search) !== false
            || mb_stripos($r->entry->slug(), $query->search) !== false)
        ));
        usort($records, static function (ContentRecord $a, ContentRecord $b) use ($query): int {
            $order = str_starts_with($query->sort, 'title_') ? strcmp($a->entry->title(), $b->entry->title()) : $a->updatedAt <=> $b->updatedAt;
            if (str_ends_with($query->sort, '_desc')) {
                $order = -$order;
            }
            return $order !== 0 ? $order : strcmp($a->entry->id(), $b->entry->id());
        });
        return array_slice($records, $offset, $limit);
    }

    private function heads(array $definitions, SiteContext $site): array
    {
        $heads = [];
        foreach ($definitions as $versions) {
            $head = $versions[max(array_keys($versions))];
            if ($head->site->equals($site)) {
                $heads[] = $head;
            }
        }
        usort($heads, static fn ($a, $b): int => strcmp($a->handle, $b->handle));
        return $heads;
    }

    private function definition(array $definitions, SiteContext $site, string $identifier, ?int $version): ContentTypeDefinition|WorkflowDefinition|null
    {
        foreach ($definitions as $versions) {
            $head = $versions[max(array_keys($versions))];
            if ($head->site->equals($site) && ($head->id === $identifier || $head->handle === $identifier)) {
                return $versions[$version ?? $head->version] ?? null;
            }
        }
        return null;
    }

    public function contentTypes(SiteContext $site): array
    {
        return $this->heads($this->types, $site);
    }
    public function workflows(SiteContext $site): array
    {
        return $this->heads($this->workflows, $site);
    }
    public function contentType(SiteContext $site, string $identifier, ?int $version = null): ?ContentTypeDefinition
    {
        return $this->definition($this->types, $site, $identifier, $version);
    }
    public function workflow(SiteContext $site, string $identifier, ?int $version = null): ?WorkflowDefinition
    {
        return $this->definition($this->workflows, $site, $identifier, $version);
    }
    public function insertContentType(ContentTypeDefinition $definition): void
    {
        if (isset($this->types[$definition->id])) {
            throw new InvalidArgumentException('Duplicate content type.');
        }
        $this->types[$definition->id] = [$definition->version => $definition];
    }
    public function insertWorkflow(WorkflowDefinition $definition): void
    {
        if (isset($this->workflows[$definition->id])) {
            throw new InvalidArgumentException('Duplicate workflow.');
        }
        $this->workflows[$definition->id] = [$definition->version => $definition];
    }
    public function publishContentType(ContentTypeDefinition $definition, int $expectedVersion): void
    {
        $this->requireVersion($this->contentType($definition->site, $definition->id)?->version, $expectedVersion);
        $this->types[$definition->id][$definition->version] = $definition;
    }
    public function publishWorkflow(WorkflowDefinition $definition, int $expectedVersion): void
    {
        $this->requireVersion($this->workflow($definition->site, $definition->id)?->version, $expectedVersion);
        $this->workflows[$definition->id][$definition->version] = $definition;
    }

    public function declareGroup(SiteContext $site, string $groupId, LocaleTag $memberLocale, ?LocaleTag $fallback = null): void
    {
        $group = $this->groups[$groupId] ?? null;
        if (
            $group !== null && ($group['site'] !== $site->identifier()
            || ($fallback !== null && $group['fallback']->toString() !== $fallback->toString()))
        ) {
            throw new InvalidTranslationGroup('Translation group declaration conflicts.');
        }
        $this->groups[$groupId] ??= ['site' => $site->identifier(), 'fallback' => $fallback ?? $memberLocale];
    }

    public function guardAttachment(SiteContext $site, string $groupId, string $contentId): void
    {
        $group = $this->groups[$groupId] ?? null;
        if ($group === null) {
            throw new RuntimeException('Translation group is not declared.');
        }
        if ($group['site'] !== $site->identifier()) {
            throw new InvalidTranslationGroup('Translation group belongs to another site.');
        }
        $others = array_filter($this->allForSite($site, PHP_INT_MAX), static fn (ContentRecord $r): bool =>
            $r->entry->translationGroupId() === $groupId && $r->entry->id() !== $contentId);
        if (count($others) >= TranslationGroup::MAXIMUM_MEMBERS) {
            throw new InvalidTranslationGroup('Translation group member limit reached.');
        }
    }

    public function forContent(SiteContext $site, string $contentId): ?TranslationGroup
    {
        $record = $this->findForSite($site, $contentId);
        $groupId = $record?->entry->translationGroupId();
        if ($groupId === null || !isset($this->groups[$groupId]) || $this->groups[$groupId]['site'] !== $site->identifier()) {
            return null;
        }
        $members = [];
        foreach ($this->allForSite($site, PHP_INT_MAX) as $member) {
            $entry = $member->entry;
            if ($entry->translationGroupId() === $groupId && $entry->locale() !== null) {
                $workflow = $this->workflow($site, $member->workflowId, $member->workflowVersion);
                $members[] = new TranslationGroupMember(
                    $entry->locale(),
                    $entry->id(),
                    $entry->slug(),
                    $entry->statusKey(),
                    $workflow?->isPublic($entry->statusKey()) ?? false,
                    $entry->publicationWindow()
                );
            }
        }
        return new TranslationGroup($groupId, $this->groups[$groupId]['fallback'], $members);
    }

    private function requireVersion(?int $actual, int $expected): void
    {
        if ($actual !== $expected) {
            throw new VersionConflict($expected, $actual ?? 0);
        }
    }
}
