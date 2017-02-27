<?php
/**
 * Created by PhpStorm.
 * User: fabien
 * Date: 26/02/2017
 * Time: 16:12
 */

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__ . '/app/autoload.php';

$kernel = new AppKernel('prod', false);


$callback = function ($request, $response) use ($kernel) {
    $content = '';
    $method = $request->getMethod();
    $headers = $request->getHeaders();
    $query = $request->getQueryParams();

    $post = array();
    if (in_array(strtoupper($method), array('POST', 'PUT', 'DELETE', 'PATCH')) &&
        isset($headers['Content-Type']) && (0 === strpos($headers['Content-Type'], 'application/x-www-form-urlencoded'))
    ) {
        parse_str($content, $post);
    }
    $sfRequest = new Symfony\Component\HttpFoundation\Request(
        $query,
        $post,
        array(),
        array(), // To get the cookies, we'll need to parse the headers
        array(),
        array(), // Server is partially filled a few lines below
        $content
    );
    $sfRequest->setMethod($method);
    $sfRequest->headers->replace($headers);
    $sfRequest->server->set('REQUEST_URI', $request->getPath());

    if (isset($headers['Host'])) {
        $sfRequest->server->set('SERVER_NAME', explode(':', $headers['Host'][0])[0]);
    }
    $sfResponse = $kernel->handle($sfRequest);

    $response->writeHead(
        $sfResponse->getStatusCode(),
        $sfResponse->headers->all()
    );
    $response->end($sfResponse->getContent());
    $kernel->terminate($sfRequest, $sfResponse);
};

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server('tcp://0.0.0.0:9090', $loop);
$http = new React\Http\Server($socket);

$http->on('request', $callback);
$loop->run();
