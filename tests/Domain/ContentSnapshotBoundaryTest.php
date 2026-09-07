<?php

declare(strict_types=1);

namespace Kumwe\Content\Tests\Domain;

use DateTimeImmutable;
use InvalidArgumentException;
use Kumwe\Content\Domain\ContentEntry;
use Kumwe\Content\Domain\ContentRevision;
use Kumwe\Content\Domain\JsonSchemaValidator;
use Kumwe\Content\Domain\FieldDefinition;
use PHPUnit\Framework\TestCase;

final class ContentSnapshotBoundaryTest extends TestCase
{
    private const ID = '018f22e2-7c8b-7ab0-8f3a-88e8026bb160';

    public function testExternalReferencesCannotRewriteAnEntryOrItsRevision(): void
    {
        $text = 'original';
        $nested = ['body' => &$text];
        $entry = ContentEntry::create(self::ID, 'Title', 'title', ['nested' => &$nested]);
        $revision = ContentRevision::capture(self::ID, $entry, 1, new DateTimeImmutable('2026-09-07T00:00:00Z'));
        $text = 'mutated';
        $nested['extra'] = 'injected';
        self::assertSame(['nested' => ['body' => 'original']], $entry->data());
        self::assertSame($entry->data(), $revision->snapshot()['data']);
        self::assertTrue($revision->hasValidChecksum());
    }

    public function testRecursiveAndInvalidKeyInputsFailBeforeSchemaOrChecksumRecursion(): void
    {
        $recursive = [];
        $recursive['self'] = &$recursive;
        foreach ([$recursive, ["\xFF" => 'invalid key'], ['body' => str_repeat('x', 4_194_305)]] as $data) {
            try {
                ContentEntry::create(self::ID, 'Title', 'title', $data);
                self::fail('Unsafe content was admitted.');
            } catch (InvalidArgumentException) {
                self::assertTrue(true);
            }
        }
        $schema = ['type' => 'object'];
        $schema['properties'] = ['child' => &$schema];
        $this->expectException(InvalidArgumentException::class);
        (new JsonSchemaValidator())->assertSupported($schema);
    }

    public function testSnapshotRetainsFloatAndArrayRepresentation(): void
    {
        $data = ['decimal' => 1.0, 'map' => ['z' => 2, 'a' => 1], 'list' => [true, null]];
        self::assertSame($data, ContentEntry::create(self::ID, 'Title', 'title', $data)->data());
    }

    public function testFieldSchemaCannotBeMutatedThroughSourceReferences(): void
    {
        $type = 'string';
        $field = new FieldDefinition('body', ['type' => &$type], true);
        $type = 'object';
        self::assertSame(['type' => 'string'], $field->schema);
    }
}
