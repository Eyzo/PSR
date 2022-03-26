<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;
use Psr\Cache\InvalidArgumentException;

class CustomInvalidArgumentException extends Exception implements InvalidArgumentException
{
    public function __toString() : string
    {
        return self::class;
    }
}
