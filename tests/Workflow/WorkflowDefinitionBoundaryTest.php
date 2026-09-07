<?php

declare(strict_types=1);

namespace Kumwe\Content\Tests\Workflow;

use DateTimeImmutable;
use InvalidArgumentException;
use Kumwe\Content\Workflow\Domain\WorkflowDefinition;
use Kumwe\Content\Workflow\Domain\WorkflowStateDefinition;
use Kumwe\Content\Workflow\Domain\WorkflowTransitionDefinition;
use Kumwe\Access\Capability;
use Kumwe\Context\Value\SiteContext;
use PHPUnit\Framework\TestCase;

final class WorkflowDefinitionBoundaryTest extends TestCase
{
    public function testSnapshotPreservesStatesAndTransitionsWhenSourceReferencesChange(): void
    {
        $state = new WorkflowStateDefinition('draft', 'Draft', initial: true);
        $published = new WorkflowStateDefinition('published', 'Published', public: true);
        $edge = new WorkflowTransitionDefinition('draft', 'published', Capability::fromString('content.publish'));
        $definition = $this->definition([&$state, $published], [&$edge]);
        $state = new WorkflowStateDefinition('other', 'Other', initial: true);
        $edge = new WorkflowTransitionDefinition('draft', 'other', Capability::fromString('content.edit'));
        self::assertSame('draft', $definition->states()[0]->key);
        self::assertSame('published', $definition->transitions()[0]->to);
    }

    public function testMalformedListsAndMistypedMembersAreControlledRefusals(): void
    {
        $initial = new WorkflowStateDefinition('draft', 'Draft', initial: true);
        foreach ([
            [['named' => $initial], []],
            [[new \stdClass()], []],
            [[$initial], [new \stdClass()]],
            [array_fill(0, 257, $initial), []],
        ] as [$states, $transitions]) {
            try {
                $this->definition($states, $transitions);
                self::fail('An invalid workflow declaration was admitted.');
            } catch (InvalidArgumentException) {
                self::assertTrue(true);
            }
        }
    }

    private function definition(array $states, array $transitions): WorkflowDefinition
    {
        $instant = new DateTimeImmutable('2026-09-07T00:00:00Z');
        return new WorkflowDefinition('018f22e2-7c8b-7ab0-8f3a-88e8026bb160', SiteContext::default(), 'editorial', 'Editorial', $states, $transitions, 1, $instant, $instant);
    }
}
