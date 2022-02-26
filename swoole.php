<?php

require __DIR__ . "/vendor/autoload.php";

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;


// $server = new Swoole\HTTP\Server("127.0.0.1", 9501);
$server = new Swoole\Http\Server("127.0.0.1", 9501);

// $server->on("start", function (Server $server) {
//     echo "Swoole http server is started at http://127.0.0.1:9501\n";
// });

$server->on("start", function (Server $server) {
    echo "Swoole http server is started.\n";
});

// $server->on("request", function (Request $request, Response $response) {
//     $response->header("Content-Type", "text/plain");
//     $response->end("Hello World\n");
// });

$server->on("request", function (Request $request, Response $response) {
    $response->header("Content-Type", "text/plain");
    $response->header("Access-Control-Allow-Origin", "*");
    $data = [
        ['id' => 1, 'title' => 'xiaomi', 'price' => 200, 'num' => 3],
        ['id' => 2, 'title' => 'huawei', 'price' => 300, 'num' => 2],
    ];
    $response->end(json_encode($data));
});

// $server->start();

$server->start();
