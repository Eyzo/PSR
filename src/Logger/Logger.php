<?php
namespace App\Logger;

use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger {
  public function log($level, \Stringable|string $message, array $context = []): void
  {
    if (!empty($context)) {
      $message = $this->convertContext($message, $context);
    }
    $fileName = _LOG_PATH.DIRECTORY_SEPARATOR.$level.'.txt';
    $stream = fopen($fileName, 'a');
    fwrite($stream, $message."\n");
    fclose($stream);
  }

  public function convertContext($message, $context)
  {
    foreach ($context as $key => $value)
    {
      if (!is_array($value) && (!is_object($value) || method_exists($value, '__toString'))) {
        $message = str_replace('{'.$key.'}',$value, $message);
      }
    }
    return $message;
  }
}
