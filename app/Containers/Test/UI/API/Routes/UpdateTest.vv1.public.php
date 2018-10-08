<?php

/**
 * @apiGroup           Test
 * @apiName            updateTest
 *
 * @api                {PATCH} /vv1/test/test/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         v1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->patch('test/test/{id}', [
    'as' => 'api_test_update_test',
    'uses'  => 'Controller@updateTest',
    'middleware' => [
      'auth:api',
    ],
]);
