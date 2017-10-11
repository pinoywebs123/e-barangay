<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBlottersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_blotters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('entry_number');
            $table->integer('user_id');
            $table->integer('status_id');
            $table->string('path');
            $table->string('incident_name');
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
        Schema::dropIfExists('user_blotters');
    }
}
