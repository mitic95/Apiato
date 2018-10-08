<?php

namespace App\Containers\Vacation\Tests\Unit;

use Apiato\Core\Traits\CallableTrait;
use App\Containers\User\Tasks\FindUserByIdTask;
use App\Containers\Vacation\Tasks\ValidateUserVacationRequestedDaysTask;
use App\Containers\Vacation\Tests\TestCase;
use App\Containers\Vacation\Actions\CreateVacationAction;
use App\Containers\Vacation\Models\Vacation;

/**
 * Class CreateVacationTest.
 */
class CreateVacationTest extends TestCase
{
    use CallableTrait;

    /**
     * @test
     */
    public function test_create_vacation()
    {
        $vacation = $this->call(CreateVacationAction::class, [2, 5]);

        $this->assertInstanceOf(Vacation::class, $vacation);
        $this->assertEquals($vacation->user_id, 2);
        $this->assertEquals($vacation->vacation_days, 5);
    }

    /**
     * @test
     * @@expectedException  \App\Containers\Vacation\Exceptions\InvalidVacationDays
     */
    public function test_create_vacation_should_thrown_exception()
    {
        $userId =  2;
        $vacationDays = 21;

        $user = $this->call(FindUserByIdTask::class, [$userId]);

        $this->call(ValidateUserVacationRequestedDaysTask::class, [$user, $vacationDays]);

        $vacation = $this->call(CreateVacationAction::class, [$userId, $vacationDays]);

        $this->assertEquals($vacation->id, 1);
    }
}
