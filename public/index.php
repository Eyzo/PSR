<?php
use App\Cache\CacheItem;
use App\Cache\CacheItemPool;

require dirname(__DIR__).'/src/Config/var_admin.php';
require dirname(__DIR__).'/vendor/autoload.php';

/** PSR3 */
//$logger = new App\Logger\Logger();
//$logger->error("message d'erreur de {user}", ['user' => 'Tony']);
//$logger->alert("message d'alerte de {warrior}", ['warrior' => 'Conor McGregor']);

/** PSR6 */
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

/** PSR7 */
//ob_start();
//require _TEMPLATE_PATH.'/index.html.php';
//$content = ob_get_clean();
//$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
//$response = new \GuzzleHttp\Psr7\Response(200, [], $content);
//\Http\Response\send($response);

/** PSR11 */
//$container = new \App\Container\Container();
//$fakeObject = new \stdClass();
//$fakeObject->id = uniqid();
//$container->set('test', $fakeObject);
//$container->get('test');


