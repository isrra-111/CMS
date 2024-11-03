<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(view: 'categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {

      Category::create([
        'name'=>$request->name
      ]);

        return redirect(route('categories.index'))->with('success','Category Created Successfully');
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
    public function edit(Category $category)
    {

        return  view('categories.create')->with('category',$category);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriesRequest $request, Category $category)
    {
        $category->update([
            'name' =>$request->name
        ]);


return redirect(route('categories.index'))->with('success','Category Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->posts->count() > 0)
        {

            return redirect(route('categories.index'))->with('error','Category cannot be deleted because it has some posts.');

        }

        $category->delete();

        return redirect(route('categories.index'))->with('success','Category Deleted Successfully');



    }
}
