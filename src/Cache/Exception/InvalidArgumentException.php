<?php
namespace App\Exception;

use Throwable;

class InvalidArgumentException implements \Psr\Cache\InvalidArgumentException
{
  public function getMessage()
  {
    return "Erreur soit l'argument est incorrect soit la clée est fausse";
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
