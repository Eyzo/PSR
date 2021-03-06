<?php

declare(strict_types=1);

namespace App\Cache;

use App\Cache\Trait\CacheFileTrait;
use App\Exception\CustomInvalidArgumentException;
use Cocur\Slugify\Slugify;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

use function array_merge;
use function call_user_func;
use function fclose;
use function file_exists;
use function fopen;
use function fwrite;
use function is_array;
use function is_callable;
use function is_object;
use function json_encode;
use function method_exists;
use function unlink;

use const DIRECTORY_SEPARATOR;

class CacheItemPool implements CacheItemPoolInterface
{
    use CacheFileTrait;

    protected array $items = [];
    protected array $defered = [];
    protected Slugify $slugify;
    public function __construct()
    {
        $this->slugify = new Slugify();
    }

    /**
     * @throws CustomInvalidArgumentException
     */
    public function getItem(string $key) : CacheItemInterface
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        } else {
            throw new CustomInvalidArgumentException();
        }
    }

    /**
     * @throws CustomInvalidArgumentException
     */
    public function getItems(array $keys = []) : iterable
    {
        $items = [];
        foreach ($keys as $key) {
            if (isset($this->items[$key])) {
                /** @var CacheItemInterface $item */
                $items[$key] = $this->items[$key];
            }
        }
        if (! empty($items)) {
            return $items;
        } else {
            throw new CustomInvalidArgumentException();
        }
    }

    public function hasItem(string $key) : bool
    {
        return isset($this->items[$key]);
    }

    public function clear() : bool
    {
        $files = $this->getFiles();
        foreach ($files as $file) {
            unlink(_CACHE_PATH . DIRECTORY_SEPARATOR . $file);
        }
        $this->items = [];
        return true;
    }

    public function deleteItem(string $key) : bool
    {
        $file = $this->getFile($key);
        if (isset($this->items[$key]) && $file && file_exists(_CACHE_PATH . DIRECTORY_SEPARATOR . $file)) {
            unlink(_CACHE_PATH . DIRECTORY_SEPARATOR . $file);
            unset($this->items[$key]);
            return true;
        } else {
            return false;
        }
    }

    public function deleteItems(array $keys) : bool
    {
        $deletedItem = [];
        foreach ($keys as $key) {
            $deleted = $this->deleteItem($key);
            if ($deleted) {
                $deletedItem[] = $key;
            }
        }
        if (empty($deletedItem)) {
            return false;
        } else {
            return true;
        }
    }

    public function save(CacheItemInterface $item) : bool
    {
        $fileName = $this->slugify->slugify($item->getKey());
        $filePath = _CACHE_PATH . DIRECTORY_SEPARATOR . $fileName . '.txt';
        if (! $item->get()) {
            if (is_callable($item->getValue())) {
                $content = call_user_func($item->getValue());
                if (is_array($content)) {
                    $content = json_encode($content);
                } elseif (is_object($content) && method_exists($content, '__toString')) {
                    $content = (string) $item->getValue();
                }
            } elseif (is_array($item->getValue())) {
                $content = json_encode($item->getValue());
            } elseif (is_object($item->getValue()) && method_exists($item->getValue(), '__toString')) {
                $content = (string) $item->getValue();
            } else {
                $content = $item->getValue();
            }
            $stream = fopen($filePath, 'w');
            fwrite($stream, $content);
            fclose($stream);
        }
        $this->items[$item->getKey()] = $item;
        return true;
    }

    public function saveDeferred(CacheItemInterface $item) : bool
    {
        $this->defered[$this->slugify->slugify($item->getKey())] = $item;
        return true;
    }

    public function commit() : bool
    {
        foreach ($this->defered as $item) {
            $this->save($item);
        }
        $this->items = array_merge($this->items, $this->defered);
        $this->defered = [];
        return true;
    }
}
