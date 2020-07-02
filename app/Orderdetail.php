<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    //
    protected $fillable = [
        'voucherno', 'qty', 'item_id'
    ];
}
