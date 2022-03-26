<?php
namespace App\EventDispatcher;

use GuzzleHttp\Psr7\Request;

class EventRequest {

  public function __construct(protected Request $request){}

  public function getRequest(): Request
  {
    return $this->request;
  }

}
