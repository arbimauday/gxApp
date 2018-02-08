<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleSTNKsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_STNKs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicleId');
            $table->string('brand');
            $table->string('assemblyYear');
            $table->string('chassisNo');
            $table->string('machineNo');
            $table->string('modelType');
            $table->string('fuel');
            $table->string('color');
            $table->string('validDate');
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
        Schema::dropIfExists('vehicle_STNK');
    }
}
