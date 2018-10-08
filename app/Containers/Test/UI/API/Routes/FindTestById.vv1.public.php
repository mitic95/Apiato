<?php

/**
 * @apiGroup           Test
 * @apiName            findTestById
 *
 * @api                {GET} /vv1/test/test/:id Endpoint title here..
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
$router->get('test/test/{id}', [
    'as' => 'api_test_find_test_by_id',
    'uses'  => 'Controller@findTestById',
    'middleware' => [
      'auth:api',
    ],
]);
