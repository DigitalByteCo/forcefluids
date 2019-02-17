<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobRevenue extends Model
{
    //
	protected $fillable = [
		'additive_id',
		'purchase_cost',
		'selling_cost',
	];

	public $timestamps = false;

	public function additive()
	{
		return $this->belongsTo(Additive::class);
	}
}
