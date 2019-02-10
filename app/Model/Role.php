<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /*
     * User role for admin
    */
    CONST ADMIN = 1;

    /*
     * User role for Sales Representative
    */
    CONST SALES = 2;

    /*
     * User role for Customer
    */
    CONST CUSTOMER = 3;

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
}
