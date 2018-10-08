<?php

namespace App\Containers\Vacation\Tasks;

use App\Containers\Vacation\Data\Repositories\UserVacationBalanceRepository;
use App\Containers\Vacation\Models\Vacation;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class DecreaseVacationBalanceTask
 *
 * @package App\Containers\Vacation\Tasks
 */
class DecreaseVacationBalanceTask extends Task
{
    protected $repository;

    /**
     * DecreaseVacationBalanceTask constructor.
     * @param UserVacationBalanceRepository $repository
     */
    public function __construct(UserVacationBalanceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Vacation $vacation
     * @return mixed
     * @throws UpdateResourceFailedException
     */
    public function run(Vacation $vacation)
    {
        try {

            $vacationBalanceId = $vacation->user->vacationBalance->id;
            $remainingDays = $vacation->user->vacationBalance->remaining_days - $vacation->vacation_days;

            return $this->repository->update(
                [
                    'remaining_days' => $remainingDays
                ],
                $vacationBalanceId
            );
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
