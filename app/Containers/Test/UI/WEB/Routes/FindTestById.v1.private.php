<?php

/** @var Route $router */
$router->get('teste/teste/{id}', [
    'as' => 'web_test_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
