<?php

namespace App\Containers\Vacation\Actions;

use App\Containers\Vacation\Tasks\FindVacationByIdTask;
use App\Ship\Parents\Actions\Action;

/**
 * Class FindVacationByIdAction
 * @package App\Containers\Vacation\Actions
 */
class FindVacationByIdAction extends Action
{

    /**
     * @param $id
     * @return mixed
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run($id)
    {
        $vacation = $this->call(FindVacationByIdTask::class, [$id]);

        return $vacation;
    }
}
