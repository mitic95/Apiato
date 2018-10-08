<?php

/**
 * @apiGroup           Vacation
 * @apiName            deleteVacation
 *
 * @api                {DELETE} /v1/vacation/request/:id Delete Vacation
 * @apiDescription     Delete vacation by id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
   "message": "Vacation (4) Deleted Successfully."
}
 */

$router->delete('vacation/request/{id}', [
    'as' => 'api_vacation_delete_vacation',
    'uses'  => 'Controller@deleteVacation',
    'middleware' => [
      'auth:api',
    ],
]);
