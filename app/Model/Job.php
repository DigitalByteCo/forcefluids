<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $fillable = [
		'company_id',
		'contact_name',
		'contact_email',
		'contact_phone',
		'date',
		'start_time',
		'end_time',
		'well_name',
		'operator',
		'lsd',
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}

	public function getStatusAttribute()
	{
		return $this->is_closed ? 'Closed' : 'Open';
	}
}
