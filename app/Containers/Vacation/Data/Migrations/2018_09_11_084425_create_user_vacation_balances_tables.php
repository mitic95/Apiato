<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Containers\Vacation\Models\UserVacationBalance;

class CreateUserVacationBalancesTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_vacation_balances', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id');
            $table->integer('remaining_days')->default(UserVacationBalance::REMAINING_DAYS);
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('user_vacation_balances');
    }
}
