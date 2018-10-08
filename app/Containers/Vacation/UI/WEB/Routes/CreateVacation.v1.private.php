<?php

/** @var Route $router */
$router->get('vacation/request/create', [
    'as' => 'web_vacation_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
