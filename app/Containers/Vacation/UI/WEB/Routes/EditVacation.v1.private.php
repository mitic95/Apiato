<?php

/** @var Route $router */
$router->get('vacation/request/{id}/edit', [
    'as' => 'web_vacation_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
