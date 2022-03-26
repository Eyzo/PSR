<?php

declare(strict_types=1);

namespace App\Container\Exception;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

class ContainerException extends Exception implements NotFoundExceptionInterface
{
    public function __toString() : string
    {
        return self::class;
    }
}
