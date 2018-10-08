<?php

/**
 * @apiGroup           Vacation
 * @apiName            updateVacation
 *
 * @api                {PATCH} /v1/vacation/request/:id Update Vacation
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  status (required)
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data":{
        "object": "Vacation",
        "id": "7ozb8r4zn469anpq",
        "user_id": 2,
        "user_balances":{
            "id": 12,
            "user_id": 2,
            "remaining_days": 10,
            "created_at": "2018-09-11 13:36:21",
            "updated_at": "2018-09-17 11:05:22"
        },
        "name": "Manager",
        "email": "manager@manager.com",
        "vacation_days": 10,
        "status": approved,
        "created_at":{
            "date": "2018-09-17 11:26:54.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at":{
            "date": "2018-09-17 11:26:54.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        }
    },
    "meta":{
        "include":[
        ],
        "custom":[
        ]
    }
}
 */

$router->patch('vacation/request/{id}', [
    'as' => 'api_vacation_update_vacation',
    'uses'  => 'Controller@updateVacation',
    'middleware' => [
      'auth:api',
    ],
]);
