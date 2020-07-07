<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orderdetail;
use App\User;

class Order extends Model
{
    //
    protected $fillable = [
        'voucherno', 'orderdate', 'total', 'address', 'status', 'user_id'
    ];

    public function orderdetails()
    {
    	return $this->hasMany('App\Orderdetail');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
