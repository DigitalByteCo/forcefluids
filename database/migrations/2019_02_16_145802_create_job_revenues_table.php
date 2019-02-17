<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_revenues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id');
            $table->integer('additive_id');
            $table->string('purchase_cost');
            $table->string('selling_cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_revenues');
    }
}
