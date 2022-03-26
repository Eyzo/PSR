<?php
namespace App\Container\Exception;

use Psr\Container\NotFoundExceptionInterface;
use Throwable;

class ContainerException implements NotFoundExceptionInterface
{
  public function getMessage()
  {
    return "l'élément demandé dans le container n'exciste pas";
  }

  public function getCode()
  {
    return 404;
  }

  public function getFile()
  {
    return null;
  }

  public function getLine()
  {
    return null;
  }

  public function getTrace()
  {
    return null;
  }

  public function getTraceAsString()
  {
    return null;
  }

  public function getPrevious()
  {
    return null;
  }

  public function __toString()
  {
    return self::class;
  }
}
