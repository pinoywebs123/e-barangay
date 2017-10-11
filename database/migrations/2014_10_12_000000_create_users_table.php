<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('image');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->string('gender');
            $table->string('dob');
            $table->string('civil_status');
            $table->string('contact');
            $table->text('address');
            $table->string('email')->unique();
            $table->integer('role_id');
            $table->integer('status_id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
