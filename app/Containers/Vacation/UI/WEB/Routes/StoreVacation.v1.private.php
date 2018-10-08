<?php

/** @var Route $router */
$router->post('vacation/request/store', [
    'as' => 'web_vacation_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
