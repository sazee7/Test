<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'orderNumber';
    public $incrementing = false;
    public $timestamps = false;
}
