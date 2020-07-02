<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategory;

class Category extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function subcategories()
    {
    	return $this->hasMany('App\Subcategory');
    }
}
