<?php
namespace App\RequestHandler;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RequestHandler implements RequestHandlerInterface
{
  /**
   * @param MiddlewareInterface[] $middlewares
   */
  protected array $middlewares = [];
  protected int $index = 0;
  protected ResponseInterface $lastResponse;

  public function __construct()
  {
    $this->lastResponse = new Response();
  }

  public function addMiddleware(MiddlewareInterface $middleware) {
    $this->middlewares[] = $middleware;
  }

  public function handle(ServerRequestInterface $request): ResponseInterface
  {
    if (isset($this->middlewares[$this->index])) {
      $middleware = $this->middlewares[$this->index];
      $this->index++;
      $this->lastResponse = $middleware->process($request, $this);
    }
    return $this->lastResponse;
  }
}
