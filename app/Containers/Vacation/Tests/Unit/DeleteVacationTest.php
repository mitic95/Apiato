<?php

namespace App\Containers\Vacation\Tests\Unit;

use Apiato\Core\Traits\CallableTrait;
use App\Containers\Vacation\Actions\CreateVacationAction;
use App\Containers\Vacation\Actions\DeleteVacationAction;
use App\Containers\Vacation\Actions\FindVacationByIdAction;
use App\Containers\Vacation\Tests\TestCase;

/**
 * Class DeleteVacationTest.
 */
class DeleteVacationTest extends TestCase
{
    use CallableTrait;

    /**
     * @test
     * @@expectedException  \App\Ship\Exceptions\NotFoundException
     */
    public function testDeleteVacation_()
    {
        $vacation = $this->call(CreateVacationAction::class, [2, 5]);
        $this->call(DeleteVacationAction::class, [$vacation->id]);

        $this->call(FindVacationByIdAction::class, [$vacation->id]);

    }
}
