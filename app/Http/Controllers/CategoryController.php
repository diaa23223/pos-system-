<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
 
    public function __construct()
    {
        //  $this->middleware(['permission:view_categories'], ['only' => ['index']]);
         $this->middleware(['permission:create_categories'], ['only' => ['store','create']]);
         $this->middleware(['permission:edit_categories'], ['only' => ['edit','update']]);
         $this->middleware(['permission:delete_categories'], ['only' => ['delete']]);
        
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $image = $request->file("image")->store('assets/uploads/category', 'public');
        Category::create($request->safe()->except('image') + ['image'=> $image]);
        return redirect()->route('categories.index')->with('success', __('Category created successfully!'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if($request->hasFile('image')){
            Storage::delete($category->image);
      $image = $request->file('image')->store('assets/uploads/category', 'public');
    } else {
        // not found image, keep the old one
        $image = $category->image;
    }
        $category->update($request->safe()->except('image')+['image'=>$image]);
        return redirect()->route('categories.index')->with('success', __('Category updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();
        return redirect()->route('categories.index')->with('success', __('Category deleted successfully!'));
    }
}
