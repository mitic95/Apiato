<?php

namespace App\Containers\Vacation\Tasks;

use App\Containers\Vacation\Data\Repositories\UserVacationBalanceRepository;
use App\Containers\Vacation\Models\UserVacationBalance;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class CreateVacationByCredentialsTask
 *
 * @package App\Containers\Vacation\Tasks
 */
class CreateVacationByCredentialsTask extends Task
{

    protected $repository;

    /**
     * CreateVacationByCredentialsTask constructor.
     * @param UserVacationBalanceRepository $repository
     */
    public function __construct(UserVacationBalanceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $user_id
     * @return UserVacationBalance
     * @throws CreateResourceFailedException
     */
    public function run(
        int $user_id
    ): UserVacationBalance {

        try {
            // create new user balances
            $user = $this->repository->create([
                'user_id'     => $user_id
            ]);

        } catch (Exception $e) {
            throw (new CreateResourceFailedException())->debug($e);
        }

        return $user;
    }

}