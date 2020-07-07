<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Item;

class Orderdetail extends Model
{
    //
    protected $fillable = [
        'voucherno', 'qty', 'item_id'
    ];

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

    public function item()
    {
    	return $this->belongsTo('App\Item');
    }
}
