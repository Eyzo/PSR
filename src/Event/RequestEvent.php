<?php
namespace App\Event;

use GuzzleHttp\Psr7\Request;
use Psr\EventDispatcher\StoppableEventInterface;

class RequestEvent implements StoppableEventInterface
{
  public function __construct(protected Request $request){}

  public function getRequest(): Request
  {
    return $this->request;
  }

  public function isPropagationStopped(): bool
  {
    if ($this->request->getBody()->getContents() == 'hello world') {
      return true;
    }
    return false;
  }
}
