<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('company_id');
            $table->date('date');
            $table->enum('location_type', ['pickup', 'delivery']);
            $table->integer('pickup_location_id')->nullable();

            $table->string('force_team_sales_rep', 80);
            $table->string('purchase_approved_by', 80);
            $table->string('po_or_na', 80);

            $table->string('driver_name', 80);
            $table->string('street_address', 80);
            $table->string('city_st_zip', 80);
            $table->string('phone_no', 20);
            $table->string('cust_rep', 80);
            $table->string('warehouse_supervisor', 80);

            $table->string('customer_receipt_file');
            $table->string('sales_order_file');
            $table->string('product_sample_file');

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
        Schema::dropIfExists('sales_orders');
    }
}
