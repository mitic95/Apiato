<?php

namespace App\Containers\Vacation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class UserVacationBalanceRepository
 */
class UserVacationBalanceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
