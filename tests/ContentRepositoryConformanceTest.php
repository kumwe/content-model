<?php

declare(strict_types=1);

namespace Kumwe\Content\Tests;

use Kumwe\Content\Application\ContentModelRepository;
use Kumwe\Content\Application\ContentSearchRepository;
use Kumwe\Content\Application\SiteScopedContentRepository;
use Kumwe\Content\Application\TranslationGroupRepository;
use Kumwe\Content\Tests\Conformance\ContentRepositoryContract;
use Kumwe\Content\Tests\Fixture\MemoryContentRepository;

final class ContentRepositoryConformanceTest extends ContentRepositoryContract
{
    private MemoryContentRepository $repository;
    protected function setUp(): void
    {
        $this->repository = new MemoryContentRepository();
    }
    protected function content(): SiteScopedContentRepository&ContentSearchRepository
    {
        return $this->repository;
    }
    protected function model(): ContentModelRepository
    {
        return $this->repository;
    }
    protected function translations(): TranslationGroupRepository
    {
        return $this->repository;
    }
}
