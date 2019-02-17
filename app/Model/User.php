<?php

namespace App\Model;

use App\Model\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'customer_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'customer_id');
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'In Active';
    }

    public function isAdmin()
    {
        return ($this->role_id === Role::ADMIN);
    }

    public function isSales()
    {
        return ($this->role_id === Role::SALES);
    }

    public function isCustomer()
    {
        return ($this->role_id === Role::CUSTOMER);
    }
}
