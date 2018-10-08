<?php

/** @var Route $router */
$router->get('teste/teste', [
    'as' => 'web_test_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
