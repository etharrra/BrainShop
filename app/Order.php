<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'voucherno', 'orderdate', 'total', 'address', 'status', 'user_id'
    ];
}
