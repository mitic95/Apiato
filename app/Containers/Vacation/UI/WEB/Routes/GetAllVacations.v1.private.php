<?php

/** @var Route $router */
$router->get('vacation/request', [
    'as' => 'web_vacation_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
