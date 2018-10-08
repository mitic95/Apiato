<?php

namespace App\Containers\Vacation\Tasks;

use App\Containers\Vacation\Data\Repositories\VacationRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class UpdateVacationTask
 *
 * @package App\Containers\Vacation\Tasks
 */
class UpdateVacationTask extends Task
{
    protected $repository;

    /**
     * UpdateVacationTask constructor.
     * @param VacationRepository $repository
     */
    public function __construct(VacationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
