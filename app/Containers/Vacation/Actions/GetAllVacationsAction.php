<?php

namespace App\Containers\Vacation\Actions;

use App\Containers\Vacation\Tasks\GetAllVacationsTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllVacationsAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run(Request $request)
    {
        $vacations = $this->call(GetAllVacationsTask::class, [], ['addRequestCriteria']);

        return $vacations;
    }
}
