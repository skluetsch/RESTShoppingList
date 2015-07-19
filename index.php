<?php

error_reporting(E_ALL);
ini_set("display_errors", 0);
define('PROJECT_ROOT', __DIR__);

// init Framework
require 'vendor/autoload.php';
$app = new \Slim\Slim([
    'custom' => include './app/config/config.php',
        ]);

$app->error(function (\Exception $e) use ($app) {
    $app->response->setStatus(500);
    echo json_decode(['message' => $e->getMessage()]);
});

$app->response->headers->set('Content-Type', 'application/json');

//-------- R O U T I N G --------

$app->get('/rels', function () {
    echo json_encode([
        'loadList' => '/list/elements',
        'addToList' => '/list/elements',
        'removeFromList' => '/list/elements',
    ]);
});

$app->group('/list', function () use ($app) {
    $list = new \Controller\ListController($app);

    $app->get('/elements', function() use($list) {
        echo json_encode($list->load());
    });
    $app->post('/elements', function() use($app, $list) {
        $lastId = $list->addElement();
        if (is_int($lastId)) {
            echo json_encode(['lastId' => $lastId]);
        } else {
            $app->response->setStatus(500);
        }
    });
    $app->delete('/elements', function() use($app, $list) {
        $lastId = $list->removeElement();
        if ($lastId == -1 || !is_int($lastId)) {
            $app->response->setStatus(500);
        }
    });
});

$app->notFound(function() use ($app) {
    $app->response->setStatus(404);
});

$app->run();
