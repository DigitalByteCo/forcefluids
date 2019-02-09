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
            $table->char('name', 100)->nullable();
            $table->char('contact_person_name', 100)->nullable();
            $table->char('contact_person_email', 255)->nullable();
            $table->char('contact_person_phone', 20)->nullable();
            $table->char('address_1', 100)->nullable();
            $table->char('street', 100)->nullable();
            $table->char('city', 20)->nullable();
            $table->char('state', 20)->nullable();
            $table->char('zipcode', 10)->nullable();

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
