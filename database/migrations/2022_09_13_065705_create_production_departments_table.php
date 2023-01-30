<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->nullable();
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
        Schema::dropIfExists('production_departments');
    }
}
