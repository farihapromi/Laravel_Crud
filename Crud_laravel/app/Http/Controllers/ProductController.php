<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $products = Product::orderBy('id', 'asc')->paginate(10);
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::where('status', 'Active')->select('id', 'name')->orderBy('name', 'asc')->get();
        $data['brands'] = Brand::where('status', 'Active')->select('id', 'name')->orderBy('name', 'asc')->get();
        $data['units'] = Unit::where('status', 'Active')->select('id', 'name')->orderBy('name', 'asc')->get();
        return view('backend.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->image;
        if ($file) {
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extention;
            $file->move('images', $fileName);
            $path = '/images/' . $fileName;
        } else {
            $path = null;
        }


        $category = new Product();
        $category->name = $request->name;
        $category->price = $request->price;
        $category->category_id = $request->category_id;
        $category->brand_id = $request->brand_id;
        $category->unit_id = $request->unit_id;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->image = $path;
        $category->save();

        return redirect()->route('product.index');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
