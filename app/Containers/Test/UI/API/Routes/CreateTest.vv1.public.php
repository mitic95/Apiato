<?php

/**
 * @apiGroup           Test
 * @apiName            createTest
 *
 * @api                {POST} /vv1/test/test Endpoint title here..
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
$router->post('test/test', [
    'as' => 'api_test_create_test',
    'uses'  => 'Controller@createTest',
    'middleware' => [
      'auth:api',
    ],
]);
