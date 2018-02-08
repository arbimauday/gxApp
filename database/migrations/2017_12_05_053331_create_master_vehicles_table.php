<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicleTypeId');
            $table->string('plateNumber');
            $table->integer('managerId');
            $table->integer('divisionId');
            $table->integer('portId');
            $table->integer('vehicleStateId');
            $table->string('purchasedDate');
            $table->string('receivedDate');
            $table->integer('vehicleStatusId');
            $table->string('kilometerData');
            $table->string('outOrNotId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_vehicles');
    }
}
