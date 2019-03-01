<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'name',
        'contact_person_name',
        'contact_person_email',
        'contact_person_phone',
        'address_1',
        'street',
        'city',
        'state',
        'zipcode',
    ];

    public function getAddressAttribute()
    {
        $address = $this->address_1.", ".$this->street."\r\n";
        $address .= $this->city.", ".$this->state."\r\n";
        $address .= $this->zipcode;
        return $address;
    }

    public function customers()
    {
        return $this->hasMany(User::class, 'company_id');
    }
}
