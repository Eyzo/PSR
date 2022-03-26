<?php

declare(strict_types=1);

namespace App\Cache\Trait;

use function array_diff;
use function array_filter;
use function array_map;
use function array_shift;
use function scandir;
use function strpos;
use function substr;

trait CacheFileTrait
{
    private function getFiles() : array
    {
        return array_diff(scandir(_CACHE_PATH), ['.', '..']);
    }

    private function getFile(string $key) : ?string
    {
        $files = array_map(static function ($file) use ($key) {
            $fileName = substr($file, 0, strpos($file, '.'));
            if ($fileName === $key) {
                return $file;
            } else {
                return null;
            }
        }, $this->getFiles());
        $files = array_filter($files);
        return array_shift($files);
    }
}
