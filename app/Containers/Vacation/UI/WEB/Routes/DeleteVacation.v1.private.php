<?php

/** @var Route $router */
$router->delete('vacation/request/{id}', [
    'as' => 'web_vacation_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
