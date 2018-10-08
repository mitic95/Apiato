<?php

/** @var Route $router */
$router->patch('vacation/request/{id}', [
    'as' => 'web_vacation_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
