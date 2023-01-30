<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('fname',255)->nullable();
            $table->string('lname',255)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile',255)->nullable();
            $table->string('password');
            $table->integer('department');
            $table->integer('role');
            $table->string('designation',255)->nullable();
            $table->integer('status')->default('0');
            $table->string('user_image',255)->nullable();
            $table->integer('is_deleted')->default('0');
            $table->dateTime('last_active_time')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

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
