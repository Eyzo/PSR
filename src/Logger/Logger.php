<?php

declare(strict_types=1);

namespace App\Logger;

use Psr\Log\AbstractLogger;
use Stringable;

use function fclose;
use function fopen;
use function fwrite;
use function is_array;
use function is_object;
use function method_exists;
use function str_replace;

use const DIRECTORY_SEPARATOR;

class Logger extends AbstractLogger
{
    /**
     * @param mixed $level
     * @param string|Stringable $message
     */
    public function log($level, string|Stringable $message, array $context = []) : void
    {
        if (! empty($context)) {
            $message = $this->convertContext($message, $context);
        }
        $fileName = _LOG_PATH . DIRECTORY_SEPARATOR . $level . '.txt';
        $stream = fopen($fileName, 'a');
        fwrite($stream, $message . "\n");
        fclose($stream);
    }

    public function convertContext(string|Stringable $message, array $context) : string
    {
        foreach ($context as $key => $value) {
            if (! is_array($value) && (! is_object($value) || method_exists($value, '__toString'))) {
                $message = str_replace('{' . $key . '}', $value, $message);
            }
        }
        return $message;
    }
}
