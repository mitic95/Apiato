<?php

namespace App\Containers\Vacation\Actions;

use App\Containers\Vacation\Models\Vacation;
use App\Containers\Vacation\Tasks\DecreaseVacationBalanceTask;
use App\Containers\Vacation\Tasks\UpdateVacationTask;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action;

/**
 * Class UpdateVacationStatusAction
 * @package App\Containers\Vacation\Actions
 */
class UpdateVacationStatusAction extends Action
{

    /**
     * @param string $vacationStatus
     * @param int $vacationId
     * @return Vacation
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run(string $vacationStatus, int $vacationId)
    {
        $this->validateStatus($vacationStatus);

        /** @var Vacation $vacation */
        $vacation = $this->call(UpdateVacationTask::class, [
            $vacationId,
            [
                'status' => $vacationStatus
            ]
        ]);

        if ($vacation->isApproved()) {
            $this->call(DecreaseVacationBalanceTask::class, [$vacation]);
        }

        return $vacation;
    }

    /**
     * @param string $vacationStatus
     */
    protected function validateStatus(string $vacationStatus)
    {

        if (!(Vacation::isStatusValid($vacationStatus))) {
            throw new UpdateResourceFailedException('invalid status!');

        }
    }
}