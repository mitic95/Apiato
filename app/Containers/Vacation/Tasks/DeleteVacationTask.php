<?php

namespace App\Containers\Vacation\Tasks;

use App\Containers\Vacation\Data\Repositories\VacationRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class DeleteVacationTask
 *
 * @package App\Containers\Vacation\Tasks
 */
class DeleteVacationTask extends Task
{

    protected $repository;

    /**
     * DeleteVacationTask constructor.
     * @param VacationRepository $repository
     */
    public function __construct(VacationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return int
     */
    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
