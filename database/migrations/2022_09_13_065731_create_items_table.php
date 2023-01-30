<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->nullable();
            $table->integer('item_no');
            $table->integer('machine_type_id')->unsigned()->index();
            $table->integer('department_id')->unsigned()->index();
            $table->foreign('machine_type_id')
            ->references('id')->on('machine_types');
            $table->foreign('department_id')
            ->references('id')->on('production_departments');
            $table->integer('site_id')->unsigned()->index();
            $table->foreign('site_id')
            ->references('id')->on('sites');
            $table->integer('setup_time');
            $table->integer('output_per_hours');
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
        Schema::dropIfExists('items');
    }
}
