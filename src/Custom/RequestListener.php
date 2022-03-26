<?php
namespace App\EventDispatcher;

class RequestListener {

  public function dumpRequest(EventRequest $eventRequest)
  {
    dump($eventRequest->getRequest());
  }

}
