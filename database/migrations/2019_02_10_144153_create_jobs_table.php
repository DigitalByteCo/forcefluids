<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('company_id');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->date('date');
            $table->time('start_time');
            $table->date('end_time');
            $table->string('well_name');
            $table->string('operator');
            $table->string('lsd');
            $table->boolean('is_closed')->default(false);
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
        Schema::dropIfExists('jobs');
    }
}
