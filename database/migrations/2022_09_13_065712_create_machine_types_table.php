<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->nullable();
            $table->float('hours_per_day', 8, 2);
            $table->float('overtime', 8, 2);
            $table->integer('number_of_machines');
            $table->integer('first_shift_machines');
            $table->integer('second_shift_machines');
            $table->integer('site');
            $table->integer('Department');
            $table->integer('status')->default('0');
            $table->integer('is_deleted')->default('0');
            $table->Integer('created_by')->default('1');
            $table->Integer('deleted_by')->default('1');
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
        Schema::dropIfExists('machine_types');
    }
}
