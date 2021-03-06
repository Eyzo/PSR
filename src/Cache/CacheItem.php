<?php

declare(strict_types=1);

namespace App\Cache;

use App\Cache\Trait\CacheFileTrait;
use Cocur\Slugify\Slugify;
use DateInterval;
use DateTime;
use DateTimeInterface;
use Psr\Cache\CacheItemInterface;

use function file_get_contents;
use function filemtime;
use function time;

use const DIRECTORY_SEPARATOR;

class CacheItem implements CacheItemInterface
{
    use CacheFileTrait;

    public function __construct(
        protected string $key,
        protected mixed $value,
        protected ?DateTime $expiresAt = null,
        protected DateInterval|int|null $expiresAfter = null
    ) {
        $this->key = (new Slugify())->slugify($this->key);
    }

    public function getKey() : string
    {
        return $this->key;
    }

    public function get() : string|bool|null
    {
        if ($this->isHit()) {
            return file_get_contents(_CACHE_PATH . DIRECTORY_SEPARATOR . $this->getFile($this->key));
        } else {
            return null;
        }
    }

    public function isHit() : bool
    {
        $file = $this->getFile($this->key);
        if ($file) {
            if ($this->expiresAt) {
                $expireAt = $this->expiresAt->getTimestamp();
                if (time() >= $expireAt) {
                    return false;
                }
            }
            if ($this->expiresAfter) {
                $lastModification = filemtime(_CACHE_PATH . DIRECTORY_SEPARATOR . $file);
                $expireAfter = $lastModification + $this->expiresAfter;
                if (time() >= $expireAfter) {
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function set(mixed $value): static
    {
        $this->value = $value;
        return $this;
    }

    public function expiresAt(?DateTimeInterface $expiration): static
    {
        $this->expiresAt = $expiration;
        return $this;
    }

    public function expiresAfter(DateInterval|int|null $time): static
    {
        $this->expiresAfter = $time;
        return $this;
    }

    public function getValue() : mixed
    {
        return $this->value;
    }
}
