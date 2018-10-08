<?php

namespace App\Containers\Vacation\Tasks;

use App\Containers\Vacation\Data\Repositories\VacationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class FindVacationByIdTask
 *
 * @package App\Containers\Vacation\Tasks
 */
class FindVacationByIdTask extends Task
{

    protected $repository;

    /**
     * FindVacationByIdTask constructor.
     * @param VacationRepository $repository
     */
    public function __construct(VacationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
