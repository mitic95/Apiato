<?php

namespace App\Containers\Vacation\Tasks;

use App\Containers\Vacation\Data\Repositories\VacationRepository;
use App\Ship\Parents\Tasks\Task;

/**
 * Class GetAllVacationsTask
 *
 * @package App\Containers\Vacation\Tasks
 */
class GetAllVacationsTask extends Task
{
    protected $repository;

    /**
     * GetAllVacationsTask constructor.
     * @param VacationRepository $repository
     */
    public function __construct(VacationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        return $this->repository->paginate();
    }
}
