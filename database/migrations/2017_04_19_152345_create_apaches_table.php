<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apaches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('all')->nullable();
            $table->text('server_name')->nullable();
            $table->text('client_address')->nullable();
            $table->text('time')->nullable();
            $table->timestamp('time_convert')->nullable();
            $table->text('method')->nullable();
            $table->text('str_query')->nullable();
            $table->text('status')->nullable();
            $table->text('url_source')->nullable();
            $table->text('user_agent')->nullable();
            $table->text('size_no_head')->nullable();
            $table->text('size_head')->nullable();
            $table->text('size_send')->nullable();
            $table->text('size_response')->nullable();
            $table->text('time_request')->nullable();

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
        Schema::dropIfExists('apaches');
    }
}
