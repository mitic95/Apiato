<?php

/**
 * @apiGroup           Test
 * @apiName            deleteTest
 *
 * @api                {DELETE} /vv1/test/test/:id Endpoint title here..
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
$router->delete('test/test/{id}', [
    'as' => 'api_test_delete_test',
    'uses'  => 'Controller@deleteTest',
    'middleware' => [
      'auth:api',
    ],
]);
