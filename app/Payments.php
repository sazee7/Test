<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'checkNumber';
    public $incrementing = false;
    public $timestamps = false;
}
