<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class FrontendController extends Controller
{
    //

    public function index()
    {
    	$items = Item::latest()->paginate(4);
    	$categories = Category::all();
    	return view('frontend.index',compact('items','categories'));
    }

    public function categories()
    {
    	$categories = Category::all();
    	return view('frontend.category.category',compact('categories'));
    }

    public function detail($id)
    {
    	$category = Category::find($id);
    	return view('frontend.category.detail',compact('category'));
    }
}
