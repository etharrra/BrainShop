<?php

namespace App\Http\Controllers;

use App\Item;
use App\Brand;
use App\Subcategory;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::all();
        return view('backend.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items = Item::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.item.create',compact('items','subcategories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = validator(request()->all(),[
            'photo' => 'required',
            'name' => 'required',
            'price' => 'required',
            'discount' => 'sometimes',
            'description' => 'required',
            'brand_id' => 'required',
            'subcategory_id' => 'required'
        ]);

        // dd(request()->discount);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if (request()->hasfile('photo')) {
            $photo = $request->file('photo');
            $upload_dir = public_path().'/storage/item/';
            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move($upload_dir,$name);
            $path = '/storage/item/'.$name;
        }

        $codeno = "BS_".mt_rand(100000, 999999);

        if (request()->discount == null) {
            request()->discount = 0;
        }

        $item = new Item;
        $item->codeno = $codeno;
        $item->photo = $path;
        $item->name = request()->name;
        $item->price = request()->price;
        $item->discount = request()->discount;
        $item->description = request()->description;
        $item->brand_id = request()->brand_id;
        $item->subcategory_id = request()->subcategory_id;
        $item->save();

        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        return view('backend.item.detail',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.item.edit',compact('item','brands','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        $validator = validator(request()->all(),[
            'oldphoto' => 'required',
            'photo' => 'sometimes',
            'name' => 'required',
            'price' => 'required',
            'discount' => 'sometimes',
            'description' => 'required',
            'brand_id' => 'required',
            'subcategory_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if (request()->hasfile('photo')) {
            $photo = $request->file('photo');
            $upload_dir = public_path().'/storage/item/';
            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move($upload_dir,$name);
            $path = '/storage/item/'.$name;

            $oldpath = public_path().'/'.request()->oldphoto;
            @unlink($oldpath);
        }else{
            $path = request()->oldphoto;
        }

        $item = Item::find($item->id);
        $item->photo = $path;
        $item->name = request()->name;
        $item->price = request()->price;
        $item->discount = request()->discount;
        $item->description = request()->description;
        $item->brand_id = request()->brand_id;
        $item->subcategory_id = request()->subcategory_id;
        $item->save();

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $item = Item::find($item->id);
        $path = public_path().'/'.$item->logo;
        if (File::exists($path)) {

            @unlink($path);
        }
        $item->delete();

        return back()->with('item_delete','Successfully Deleted!');
    }
}
