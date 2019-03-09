<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = [
		'job_id',
		'time',
		'wellhead_pressure',
		'circulation_pressure',
		'discharge_rate',
		'additive_id',
		'gallons',
		'description',
	];

	public function additive()
	{
		return $this->belongsTo(Additive::class);
	}
}
