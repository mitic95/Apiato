<?php

/** @var Route $router */
$router->post('teste/teste/store', [
    'as' => 'web_test_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
