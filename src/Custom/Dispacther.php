<?php
namespace App\EventDispatcher;

class Dispacther
{
  public function __construct(protected array $listeners = []){}

  public function on(string $name, callable $handle)
  {
    $this->listeners[$name] = $handle;
  }

  public function dispatch(string $name,object $event)
  {
    if (isset($this->listeners[$name])) {
      call_user_func($this->listeners[$name], $event);
    } else {
      return false;
    }
  }
}
