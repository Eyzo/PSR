<?php
namespace App\ListenerProvider;

use Psr\EventDispatcher\ListenerProviderInterface;

class ListenerProvider implements ListenerProviderInterface
{
  public function __construct(protected array $listeners = []){}

  public function getListenersForEvent(object $event): iterable
  {
    $listeners = [];
    if (isset($this->listeners[$event::class])) {
      $listeners = $this->listeners[$event::class];
    }
    return $listeners;
  }

  public function addListener(object $event, callable $handle)
  {
    $this->listeners[$event::class][] = $handle;
  }

}
