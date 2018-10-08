<?php

namespace App\Containers\Vacation\Tests\Unit;

use Apiato\Core\Traits\CallableTrait;
use App\Containers\Vacation\Actions\CreateVacationAction;
use App\Containers\Vacation\Actions\UpdateVacationStatusAction;
use App\Containers\Vacation\Tests\TestCase;

/**
 * Class UpdateVacationTest.
 */
class UpdateVacationTest extends TestCase
{
    use CallableTrait;

//    protected $userId;
//    protected $vacationDays;
//
//
//    public function setUp()
//    {
//        parent::setUp();
//
//        $this->userId = 2;
//        $this->vacationDays = 5;
//    }

    /**
     * @test
     */
    public function update_vacation_should_succesfully_update_vacation()
    {
        $vacation = $this->call(CreateVacationAction::class, [2, 5]);

        $this->call(UpdateVacationStatusAction::class, ['rejected', $vacation->id]);

        $this->assertEquals($vacation->user->vacationBalance->remaining_days, 20);
        $this->assertEquals($vacation->id, 1);
    }
    /**
     * @test
     * @@expectedException  \App\Ship\Exceptions\UpdateResourceFailedException
     */

    public function update_vacation_should_throw_exception_on_invalid_status()
    {
        $vacation = $this->call(CreateVacationAction::class, [2, 5]);

        $this->call(UpdateVacationStatusAction::class, ['wrongStatus', $vacation->id]);

        $this->assertEquals($vacation->id, 1);
    }

    /**
     * @test
     */
    public function vacation_balance_on_approved_vacation_should_match()
    {
        $vacation = $this->call(CreateVacationAction::class, [2, 5]);

        $this->call(UpdateVacationStatusAction::class, ['approved', $vacation->id]);

        $vacationBalance = $vacation->user->vacationBalance->remaining_days;

        $this->assertEquals($vacationBalance, 15);
    }
}