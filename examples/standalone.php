<?php
declare(strict_types=1);
if (!class_exists(Composer\Autoload\ClassLoader::class, false)) {
    require dirname(__DIR__) . '/vendor/autoload.php';
}
use Kumwe\Content\Domain\ContentEntry;
$entry = ContentEntry::create('018f22e2-7c8b-7ab0-8f3a-88e8026bc100', 'Welcome', 'welcome', ['body' => 'Hello']);
if ($entry->snapshot()['slug'] !== 'welcome') { throw new RuntimeException('Content snapshot mismatch.'); }
echo "Content model example passed.\n";
