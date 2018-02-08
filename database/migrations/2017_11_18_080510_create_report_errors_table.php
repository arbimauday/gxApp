<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_errors', function (Blueprint $table){
            $table->increments('id_report');
            $table->integer('id_user_by');
            $table->mediumText('notes', 2000);
            $table->integer('id_notif');
            $table->integer('id_status');
            $table->integer('id_send_skype');
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
        Schema::dropIfExists('report_errors');
    }
}
