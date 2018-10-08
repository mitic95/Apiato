<?php

namespace App\Containers\Vacation\Actions;

use App\Containers\User\Tasks\FindUserByIdTask;
use App\Containers\Vacation\Models\Vacation;
use App\Containers\Vacation\Tasks\CreateVacationTask;
use App\Containers\Vacation\Tasks\ValidateUserVacationRequestedDaysTask;
use App\Ship\Parents\Actions\Action;

/**
 * Class CreateVacationAction
 * @package App\Containers\Vacation\Actions
 */
class CreateVacationAction extends Action
{
    /**
     * @param int $userId
     * @param int $vacationDays
     * @return Vacation
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run(int $userId, int $vacationDays): Vacation
    {
        $data['user_id'] =  $userId;
        $data['vacation_days'] = $vacationDays;

        $user = $this->call(FindUserByIdTask::class, [$data['user_id']]);

        $this->call(ValidateUserVacationRequestedDaysTask::class, [$user, $vacationDays]);

        $vacation = $this->call(CreateVacationTask::class, [$data]);

        return $vacation;
    }
}
