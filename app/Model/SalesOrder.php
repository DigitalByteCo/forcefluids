<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
	protected $fillable = [
		'user_id',
		'company_id',
		'date',
		'location_type',
		'force_team_sales_rep',
		'purchase_approved_by',
		'po_or_na',
		'driver_name',
		'street_address',
		'city_st_zip',
		'phone_no',
		'cust_rep',
		'warehouse_supervisor',
		'customer_receipt_file',
		'sales_order_file',
		'product_sample_file',
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function pickupLocation()
	{
		return $this->belongsTo(PickupLocation::class);
	}

	public function salesOrderProducts()
	{
		return $this->hasMany(SalesOrderProduct::class);
	}
}
