<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('employer_name')->nullable();
            $table->text('employer_ip')->nullable();
            $table->text('employer_department')->nullable();
            $table->text('employer_post')->nullable();
            $table->text('employer_email')->nullable();
            $table->text('employer_phone')->nullable();
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
        Schema::dropIfExists('users_lists');
    }
}
