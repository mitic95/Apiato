<?php

namespace App\Containers\Vacation\Actions;

use App\Containers\Vacation\Tasks\DeleteVacationTask;
use App\Ship\Parents\Actions\Action;

/**
 * Class DeleteVacationAction
 * @package App\Containers\Vacation\Actions
 */
class DeleteVacationAction extends Action
{

    /**
     * @param int $vacationId
     * @return mixed
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run(int $vacationId)
    {
        $vacation = $this->call(DeleteVacationTask::class, [$vacationId]);

        return $vacation;
    }
}
