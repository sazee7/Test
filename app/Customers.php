<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customerNumber';
    public $incrementing = false;
    public $timestamps = false;
    public function orders()
    {
        return $this->hasMany('App\Orders', 'customerNumber', 'customerNumber');
    }

    public function payments()
    {
        return $this->hasMany('App\Payments', 'customerNumber', 'customerNumber');
    }
}
