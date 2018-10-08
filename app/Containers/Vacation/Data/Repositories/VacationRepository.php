<?php

namespace App\Containers\Vacation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class VacationRepository
 */
class VacationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '='
        // ...
    ];

}
