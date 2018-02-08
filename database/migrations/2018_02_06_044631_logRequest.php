<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('logRequest', function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->string('causer', 191);
                    $table->string('via', 191);
                    $table->string('causerIPAdress', 191);
                    $table->string('subject', 191);
                    $table->string('action', 191);
                    $table->string('level',4);
                    $table->text('description');
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
        //
        Schema::dropIfExists('logRequest');
    }
}
