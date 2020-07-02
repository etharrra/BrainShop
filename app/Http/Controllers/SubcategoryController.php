<?php

namespace App\Http\Controllers;

use App\Subcategory;
use Illuminate\Http\Request;
use App\Category;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcategories = Subcategory::all();
        return view('backend.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('backend.subcategory.create',compact('categories'));
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
            'name' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $subcategory = new Subcategory;
        $subcategory->name = request()->name;
        $subcategory->category_id = request()->category_id;
        $subcategory->save();

        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
        $categories = Category::all();
        return view('backend.subcategory.edit',compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
        $validator = validator(request()->all(),[
            'name' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $subcategory = Subcategory::find($subcategory->id);
        $subcategory->name = request()->name;
        $subcategory->category_id = request()->category_id;
        $subcategory->save();

        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        //
        $subcategory = Subcategory::find($subcategory->id);
        $subcategory->delete();

        return back()->with('subcategory_delete','Successfully deleted!');
    }
}
