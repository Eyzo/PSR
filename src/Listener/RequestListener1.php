<?php
namespace App\Listener;
use App\Event\RequestEvent;

class RequestListener1 {

  public function function1(RequestEvent $eventRequest)
  {
    return $eventRequest;
  }

  public function function2(RequestEvent $eventRequest)
  {
    $eventRequest->getRequest()->getBody()->write('hello world');
    $eventRequest->getRequest()->getBody()->rewind();
    return $eventRequest;
  }

  public function function3(RequestEvent $requestEvent)
  {
    return $requestEvent;
  }

}
