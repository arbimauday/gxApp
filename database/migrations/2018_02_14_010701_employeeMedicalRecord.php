<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeMedicalRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
//        Schema::create('employeeMedical', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->increments('employeeId');
//            $table->boolean('longtermMedication');
//            $table->string('typeofDisease',100);
//            $table->string('sinceWhenMedication',20);
//            $table->string('typeofDrug', 100);
//            $table->boolean('smoker');
//            $table->string('amountSmoker',40);
//            $table->string('sinceWhenSmoker',20);
//            $table->boolean('drinker');
//            $table->string('amountDrinker',40);
//            $table->string('sinceWhenDrinker', 20);
//            $table->string('typeofDrink',100);
//            $table->boolean('hadanAccident');
//            $table->string('sinceWhenAccident',20);
//            $table->string('typeofAccident',100);
//            $table->boolean('experiencedOperation');
//            $table->string('sinceWhenOperation',20);
//            $table->string('typeofOperation',100);
//            $table->boolean('hospitalized');
//            $table->string('sinceWhenHospitalized',20);
//            $table->string('typeofHospitalized',100);
//            $table->string('dietaryHabit',100);
//            $table->string('typeofSport',100);
//            $table->string('exerciseHabits',100);
//            $table->string('frequencyofSports',100);
//            $table->string('noteEtc',150);
//            $table->string('bodyHeight',9);
//            $table->string('sizeofGlass',50);
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('employeeMedical');
    }
}
