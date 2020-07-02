<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;
use App\Subcategory;

class Item extends Model
{
    //
    protected $fillable = [
        'codeno', 'name', 'photo', 'price', 'discount', 'description', 'brand_id', 'subcategory_id'
    ];

    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }

    public function subcategory()
    {
    	return $this->belongsTo('App\Subcategory');
    }
}
