<?php

namespace App\Containers\Vacation\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Containers\Vacation\Exceptions\InvalidVacationDays;
use App\Ship\Parents\Tasks\Task;

class ValidateUserVacationRequestedDaysTask extends Task
{

    /** @var UserRepository */
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(User $user, int $vacationDays)
    {
        if ($user->canTakeVacationBasedOnRequestedDays($vacationDays)) {
            throw new InvalidVacationDays('You cant take more than 20 days per year');
        }
    }
}
