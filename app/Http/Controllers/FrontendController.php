<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Subcategory;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Orderdetail;

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

    public function getitem($subcategoryid)
    {
        $subcategory = Subcategory::find($subcategoryid);
        $items = $subcategory->items;
        return compact('items');

    }

    public function getlogin()
    {
        $sts = '';
        if (Auth::check()) {
            $sts = 1;
        } else {
            $sts = 0;
        }

        return $sts;
    }

    public function items()
    {
        $items = Item::all();
        return view('frontend.item.index',compact('items'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function itemdetail($id)
    {
        $item = Item::find($id);
        $subcategory = $item->subcategory;
        $items = Item::latest()->paginate(4);
        $category = $subcategory->category;
        // dd($category->name);
        return view('frontend.item.detail',compact('item','items','subcategory','category'));
    }

    public function orders()
    {
        return view('frontend.order.index');
    }
}
