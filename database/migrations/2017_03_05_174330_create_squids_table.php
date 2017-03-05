<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSquidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('time')->nullable();
            $table->timestamp('time_convert')->nullable();
            $table->text('duration')->nullable();
            $table->text('client_address')->nullable();
            $table->text('result_codes')->nullable();
            $table->text('bytes')->nullable();
            $table->text('request_method')->nullable();
            $table->text('url')->nullable();
            $table->text('user')->nullable();
            $table->text('hierarchy_code')->nullable();
            $table->text('type')->nullable();

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
        Schema::dropIfExists('squids');
    }
}
