<?php

/** @var Route $router */
$router->delete('teste/teste/{id}', [
    'as' => 'web_test_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
