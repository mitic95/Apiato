<?php

/**
 * @apiGroup           Vacation
 * @apiName            findVacationById
 *
 * @api                {GET} /v1/vacation/request/:id Find Vacation
 * @apiDescription     Find vacation by id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data":{
        "object": "Vacation",
        "id": "w6l8b75dy5qkv9ze",
        "user_id": 2,
        "user_balances":{
            "id": 12,
            "user_id": 2,
            "remaining_days": 20,
            "created_at": "2018-09-11 13:36:21",
            "updated_at": "2018-09-17 11:05:22"
        },
        "name": "Manager",
        "email": "manager@manager.com",
        "vacation_days": 10,
        "status": "rejected",
        "created_at":{
            "date": "2018-09-10 14:58:42.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at":{
            "date": "2018-09-14 14:58:09.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "real_id": 7
    },
    "meta":{
        "include":[
        ],
        "custom":[
        ]
    }
}
 */

/** @var Route $router */
$router->get('vacation/request/{id}', [
    'as' => 'api_vacation_find_vacation_by_id',
    'uses'  => 'Controller@findVacationById',
    'middleware' => [
      'auth:api',
    ],
]);
