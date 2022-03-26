<?php
use App\Cache\CacheItem;
use App\Cache\CacheItemPool;
use Symfony\Component\WebLink\GenericLinkProvider;
use Symfony\Component\WebLink\HttpHeaderSerializer;
use Symfony\Component\WebLink\Link;

require dirname(__DIR__).'/src/Config/var_admin.php';
require dirname(__DIR__).'/vendor/autoload.php';

/**
 * PSR1 Format du code
 * Convention d'écriture du code
 */

/**
 * PSR3 Logger interface
 * Système de log
 */
//$logger = new App\Logger\Logger();
//$logger->error("message d'erreur de {user}", ['user' => 'Tony']);
//$logger->alert("message d'alerte de {warrior}", ['warrior' => 'Conor McGregor']);

/**
 * PSR4 Autoloading standard
 * Nommage des namespaces et classes pour les autloader
 */

/**
 * PSR6 Caching interface
 * Système de cache
 */
//$time_start = microtime(true);
//$cacheItemPool = new CacheItemPool();
//$cacheItem = new CacheItem('bite', function (){
//  sleep(5);
//  $hello = 'Hello World';
//  ob_start();
//  require _ROOT.'/template/index.html.php';
//  $content = ob_get_clean();
//  return $content;
//});
//$cacheItem->expiresAfter(180);
//$cacheItemPool->save($cacheItem);
//echo $cacheItem->get();
//$time_end = microtime(true);
//$execution_time = ($time_end - $time_start);

/**
 * PSR7 HTTP Message interface
 * Pour rendre les requêtes et résponses sous forme d'objet
 */
//ob_start();
//require _TEMPLATE_PATH.'/index.html.php';
//$content = ob_get_clean();
//$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
//$response = new \GuzzleHttp\Psr7\Response(200, [], $content);
//\Http\Response\send($response);

/**
 * PSR11 Container Interface
 * Pour contenir les dépendances
 */
//$container = new \App\Container\Container();
//$fakeObject = new \stdClass();
//$fakeObject->id = uniqid();
//$container->set('test', $fakeObject);
//$container->get('test');

/**
 * PSR12 coding standard
 * Pour normaliser le code
 */
//CODE SNIFFER check et fix

/**
 * PSR13 Hypermedia Links
 * Permet d'ajouter des links dans les en têtes http
 */
//Pour rajouter des links dans les headers http
//$linkProvider = (new GenericLinkProvider())
//  ->withLink(new Link('preload', '/bootstrap.min.css'));
//header('Link: '.(new HttpHeaderSerializer())->serialize($linkProvider->getLinks()));
//echo 'Hello';

/**
 * PSR14 EventDispatcher
 * Permet d'envoyer et de réagir a des evements
 */
//$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
//$requestEvent = new \App\EventDispatcher\RequestEvent($request);
//$listener = new \App\Listener\RequestListener1();
//$listenerProvider = new \App\EventDispatcher\ListenerProvider();
//$listenerProvider->addListener($requestEvent, [$listener, 'function1']);
//$listenerProvider->addListener($requestEvent, [$listener, 'function2']);
//$listenerProvider->addListener($requestEvent, [$listener, 'function3']);
//$dispatcher = new \App\EventDispatcher\EventDispatcher($listenerProvider);
//$dispatcher->dispatch($requestEvent);

/**
 * PSR15 Http Handlers
 * Pour gérer les requêtes http et envoyer une reponse adaptée
 */
//$serverRequest = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
//$requestHandler = new \App\RequestHandler\RequestHandler();
//$requestHandler->addMiddleware(new \App\Middleware\Middleware());
//$response = $requestHandler->handle($serverRequest);
//\Http\Response\send($response);

/** PSR16 Simple Cache
 * Verison simplifié du PSR6
 */

/** PSR17 HTTP Factories
 * Pour créer les objets messages http
 */
//$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();

/**
 * PSR18 Http client
 * pour communiquer avec les API
 */
//$client = new \GuzzleHttp\Client();
//$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
//echo $response->getStatusCode(); // 200
//echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
//echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
