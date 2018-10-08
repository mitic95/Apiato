<?php

/** @var Route $router */
$router->patch('teste/teste/{id}', [
    'as' => 'web_test_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
