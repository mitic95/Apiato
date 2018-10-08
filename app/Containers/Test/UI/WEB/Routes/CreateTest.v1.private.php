<?php

/** @var Route $router */
$router->get('teste/teste/create', [
    'as' => 'web_test_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
