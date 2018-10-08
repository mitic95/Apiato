<?php

namespace App\Containers\Vacation\Tests\Unit;

use Apiato\Core\Traits\CallableTrait;
use App\Containers\Vacation\Actions\CreateVacationAction;
use App\Containers\Vacation\Actions\FindVacationByIdAction;
use App\Containers\Vacation\Tests\TestCase;

/**
 * Class FindVacationTest.
 */
class FindVacationTest extends TestCase
{
    use CallableTrait;
    /**
     * @test
     */
    public function testFindVacation_()
    {
        $vacation = $this->call(CreateVacationAction::class, [2, 5]);
        $this->call(FindVacationByIdAction::class, [$vacation->id]);

        $this->assertEquals($vacation->id, 1);
    }
}
