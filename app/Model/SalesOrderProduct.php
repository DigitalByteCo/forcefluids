<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalesOrderProduct extends Model
{
    //
	public $timestamps = false;

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
