<?php
namespace App\EventDispatcher;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Psr\EventDispatcher\StoppableEventInterface;

class EventDispatcher implements EventDispatcherInterface
{
  public function __construct(protected ListenerProviderInterface $listenerProvider){}

  public function dispatch(object $event): object
  {
    $callables = $this->listenerProvider->getListenersForEvent($event);
    foreach ($callables as $callable) {
      if ($event instanceof StoppableEventInterface && $event->isPropagationStopped()) {
        break;
      }
      $event = call_user_func($callable, $event);
    }
    return $event;
  }
}
