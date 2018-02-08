<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleKIRsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_KIRs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicleId');
            $table->string('ownerName');
            $table->string('ownerAddress');
            $table->string('periodicTestNumber');
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
        Schema::dropIfExists('vehicle_KIR');
    }
}
