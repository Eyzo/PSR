<?php
namespace App\Container;

use App\Container\Exception\ContainerException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
  public function __construct(protected array $container = []){}

  public function get(string $id)
  {
    if (isset($this->container[$id])) {
      return $this->container[$id];
    } else {
      throw new ContainerException();
    }
  }

  public function has(string $id): bool
  {
    return isset($this->container[$id]);
  }

  public function set(string $id, object $value)
  {
    $this->container[$id] = $value;
  }
}
