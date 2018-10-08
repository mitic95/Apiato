<?php

namespace App\Containers\Vacation\UI\WEB\Controllers;

use App\Containers\Vacation\Actions\CreateVacationAction;
use App\Containers\Vacation\Actions\UpdateVacationStatusAction;
use App\Containers\Vacation\UI\WEB\Requests\CreateVacationRequest;
use App\Containers\Vacation\UI\WEB\Requests\DeleteVacationRequest;
use App\Containers\Vacation\UI\WEB\Requests\GetAllVacationsRequest;
use App\Containers\Vacation\UI\WEB\Requests\FindVacationByIdRequest;
use App\Containers\Vacation\UI\WEB\Requests\UpdateVacationRequest;
use App\Containers\Vacation\UI\WEB\Requests\StoreVacationRequest;
use App\Containers\Vacation\UI\WEB\Requests\EditVacationRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Vacation\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllVacationsRequest $request
     */
    public function index(GetAllVacationsRequest $request)
    {
        $vacations = Apiato::call('Vacation@GetAllVacationsAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindVacationByIdRequest $request
     */
    public function show(FindVacationByIdRequest $request)
    {
        $vacation = Apiato::call('Vacation@FindVacationByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateVacationRequest $request
     */
    public function create(CreateVacationRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreVacationRequest $request
     */
    public function store(StoreVacationRequest $request)
    {
        $vacation = Apiato::call(CreateVacationAction::class, [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditVacationRequest $request
     */
    public function edit(EditVacationRequest $request)
    {
        $vacation = Apiato::call('Vacation@GetVacationByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateVacationRequest $request
     */
    public function update(UpdateVacationRequest $request)
    {
        $vacation = Apiato::call(UpdateVacationStatusAction::class, [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteVacationRequest $request
     */
    public function delete(DeleteVacationRequest $request)
    {
         $result = Apiato::call('Vacation@DeleteVacationAction', [$request]);

         // ..
    }
}
