<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();
        return view('backend.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.brand.create');
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
            'logo' => 'required|mimes:jpeg,jpg,png',
            'name' => 'required' 
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if (request()->hasfile('logo')) {
            $logo = $request->file('logo');
            $upload_dir = public_path().'/storage/brand/';
            $name = time().'.'.$logo->getClientOriginalExtension();
            $logo->move($upload_dir,$name);
            $path = '/storage/brand/'.$name;
        }

        $brand = new Brand;
        $brand->logo = $path;
        $brand->name = request()->name;
        $brand->save();

        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
        return view('backend.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
        $validator = validator(request()->all(),[
            'name' => 'required',
            'logo' => 'sometimes',
            'oldlogo' => 'required'
        ]);

        // dd(request()->oldlogo);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if ($request->hasfile('logo')) {
            $logo = $request->file('logo');
            $upload_dir = public_path().'/storage/brand/';
            $name = time().'.'.$logo->getClientOriginalExtension();
            $logo->move($upload_dir,$name);
            $path = '/storage/brand/'.$name;
            $oldpath = public_path().'/'.request()->oldlogo;
            @unlink($oldpath);
        }else{
            $path = request()->oldlogo;
        }

        $brand = Brand::find($brand->id);
        $brand->logo = $path;
        $brand->name = request()->name;
        $brand->save();

        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
        $brand = Brand::find($brand->id);
        $path = public_path().'/'.$brand->logo;
        if (File::exists($path)) {

            @unlink($path);
        }
        $brand->delete();

        return back()->with('brand_delete','Successfully Deleted!');
    }
}
