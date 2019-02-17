<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('contact_person_name', 100)->nullable();
            $table->string('contact_person_email', 255)->nullable();
            $table->string('contact_person_phone', 20)->nullable();
            $table->string('address_1', 100)->nullable();
            $table->string('street', 100)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('state', 20)->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
