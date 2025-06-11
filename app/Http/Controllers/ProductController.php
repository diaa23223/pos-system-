<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
      return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $image = $request->file('image')->store('assets/uploads/product', 'public');

        Product::create($request->safe()->except('image')+['image'=>$image]);
        
        return redirect()->route('products.index')->with('success',__('product created successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
      return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
      
       return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
      if($request->hasFile('image')){
        Storage::delete($product->image);

        $image = $request->file('image')->store('assets/uploads/product' , 'public');
      }else{
        $image = $product->image;
      }

      $product->update($request->safe()->except('image')+['image'=>$image]);

      return redirect()->route('products.index')->with('success',__('products updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('products.index')->with('success',__('products deleted successfully!'));
    }
}
