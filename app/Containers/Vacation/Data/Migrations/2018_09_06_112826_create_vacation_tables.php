<?php

use App\Containers\Vacation\Models\Vacation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVacationTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vacations', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id');
            $table->integer('vacation_days');
            $table->string('status')->default(Vacation::STATUS_PENDING);
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('vacations');
    }
}