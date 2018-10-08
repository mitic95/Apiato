<?php

namespace App\Containers\Vacation\UI\API\Controllers;

use App\Containers\Vacation\Actions\CreateVacationAction;
use App\Containers\Vacation\Actions\DeleteVacationAction;
use App\Containers\Vacation\Actions\FindVacationByIdAction;
use App\Containers\Vacation\Actions\GetAllVacationsAction;
use App\Containers\Vacation\Actions\UpdateVacationStatusAction;
use App\Containers\Vacation\UI\API\Requests\CreateVacationRequest;
use App\Containers\Vacation\UI\API\Requests\DeleteVacationRequest;
use App\Containers\Vacation\UI\API\Requests\GetAllVacationsRequest;
use App\Containers\Vacation\UI\API\Requests\FindVacationByIdRequest;
use App\Containers\Vacation\UI\API\Requests\UpdateVacationRequest;
use App\Containers\Vacation\UI\API\Transformers\VacationTransformer;
use App\Ship\Parents\Controllers\ApiController;

/**
 * Class Controller
 *
 * @package App\Containers\Vacation\UI\API\Controllers
 */
class Controller extends ApiController
{

    /**
     * @param CreateVacationRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function createVacation(CreateVacationRequest $request)
    {
        $userId = $this->getAuthUser()->id;

        $vacation = $this->call(CreateVacationAction::class, [$userId, $request->vacationDays]);

        return $this->created($this->transform($vacation, VacationTransformer::class));
    }

    /**
     * @param FindVacationByIdRequest $request
     * @return array
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function findVacationById(FindVacationByIdRequest $request)
    {
        $vacation = $this->call(FindVacationByIdAction::class, [$request->id]);

        return $this->transform($vacation, VacationTransformer::class);
    }

    /**
     * @param GetAllVacationsRequest $request
     * @return array
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function getAllVacations(GetAllVacationsRequest $request)
    {
        $vacations = $this->call(GetAllVacationsAction::class, [$request]);

        return $this->transform($vacations, VacationTransformer::class);
    }


    /**
     * @param UpdateVacationRequest $request
     * @return array
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function updateVacation(UpdateVacationRequest $request)
    {
        $vacation = $this->call(UpdateVacationStatusAction::class, [$request->status, $request->id]);

        return $this->transform($vacation, VacationTransformer::class);
    }


    /**
     * @param DeleteVacationRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function deleteVacation(DeleteVacationRequest $request)
    {
        $this->call(DeleteVacationAction::class, [$request->id]);

        return $this->noContent();
    }
}
