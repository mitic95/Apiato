<?php

namespace App\Containers\Vacation\Tasks;

use App\Containers\Vacation\Data\Repositories\VacationRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class CreateVacationTask
 *
 * @package App\Containers\Vacation\Tasks
 */
class CreateVacationTask extends Task
{
    protected $repository;

    /**
     * CreateVacationTask constructor.
     * @param VacationRepository $repository
     */
    public function __construct(VacationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws CreateResourceFailedException
     */
    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}