<?php

/** @var Route $router */
$router->get('vacation/request/{id}', [
    'as' => 'web_vacation_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
