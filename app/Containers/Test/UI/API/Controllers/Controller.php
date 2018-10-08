<?php

namespace App\Containers\Test\UI\API\Controllers;

use App\Containers\Test\UI\API\Requests\CreateTestRequest;
use App\Containers\Test\UI\API\Requests\DeleteTestRequest;
use App\Containers\Test\UI\API\Requests\GetAllTestsRequest;
use App\Containers\Test\UI\API\Requests\FindTestByIdRequest;
use App\Containers\Test\UI\API\Requests\UpdateTestRequest;
use App\Containers\Test\UI\API\Transformers\TestTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Test\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateTestRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTest(CreateTestRequest $request)
    {
        $test = Apiato::call('Test@CreateTestAction', [$request]);

        return $this->created($this->transform($test, TestTransformer::class));
    }

    /**
     * @param FindTestByIdRequest $request
     * @return array
     */
    public function findTestById(FindTestByIdRequest $request)
    {
        $test = Apiato::call('Test@FindTestByIdAction', [$request]);

        return $this->transform($test, TestTransformer::class);
    }

    /**
     * @param GetAllTestsRequest $request
     * @return array
     */
    public function getAllTests(GetAllTestsRequest $request)
    {
        $tests = Apiato::call('Test@GetAllTestsAction', [$request]);

        return $this->transform($tests, TestTransformer::class);
    }

    /**
     * @param UpdateTestRequest $request
     * @return array
     */
    public function updateTest(UpdateTestRequest $request)
    {
        $test = Apiato::call('Test@UpdateTestAction', [$request]);

        return $this->transform($test, TestTransformer::class);
    }

    /**
     * @param DeleteTestRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTest(DeleteTestRequest $request)
    {
        Apiato::call('Test@DeleteTestAction', [$request]);

        return $this->noContent();
    }
}
