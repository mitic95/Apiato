<?php

/** @var Route $router */
$router->get('teste/teste/{id}/edit', [
    'as' => 'web_test_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
