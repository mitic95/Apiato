<?php

/**
 * @apiGroup           Test
 * @apiName            getAllTests
 *
 * @api                {GET} /vv1/test/test Endpoint title here..
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
$router->get('test/test', [
    'as' => 'api_test_get_all_tests',
    'uses'  => 'Controller@getAllTests',
    'middleware' => [
      'auth:api',
    ],
]);
