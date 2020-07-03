<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Item;

class Subcategory extends Model
{
    //
    protected $fillable = [
        'name', 'category_id'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function items()
    {
    	return $this->hasMany('App\Item');
    }
}
