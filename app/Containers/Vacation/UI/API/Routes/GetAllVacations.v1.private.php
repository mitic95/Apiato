<?php

/**
 * @apiGroup           Vacation
 * @apiName            getAllVacations
 *
 * @api                {GET} /v1/vacation/request Get All Vacation
 * @apiDescription     Get all vacation
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data":[
        {
        "object": "Vacation",
        "id": "w6l8b75dy5qkv9ze",
        "user_id": 2,
            "user_balances":{
            "id": 12,
            "user_id": 2,
            "remaining_days": 20,
            "created_at": "2018-09-11 13:36:21",
            "updated_at": "2018-09-18 08:46:57"
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
    {
        ...
    },
    ],
    "meta":{
        "include":[
            "roles"
        ],
        "custom":[

        ],
        "pagination":{
            "total": 3,
            "count": 3,
            "per_page": 10,
            "current_page": 1,
            "total_pages": 1,
            "links":[

            ]
        }
    }
}
 */

/** @var Route $router */
$router->get('vacation/request', [
    'as' => 'api_vacation_get_all_vacations',
    'uses'  => 'Controller@getAllVacations',
    'middleware' => [
      'auth:api',
    ],
]);
