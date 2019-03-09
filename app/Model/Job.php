<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $fillable = [
		'contact_name',
		'contact_email',
		'contact_phone',
		'date',
		'start_time',
		'end_time',
		'well_name',
		'operator',
		'discharge_total',
		'lsd',
	];

	public function customer()
	{
		return $this->belongsTo(User::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}

	public function revenues()
	{
		return $this->hasMany(JobRevenue::class);
	}

	public function getStatusAttribute()
	{
		return $this->is_closed ? 'Closed' : 'Open';
	}
}
