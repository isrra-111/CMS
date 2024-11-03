<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagsRequest;

use App\Models\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(view: 'tags.index')->with('tags',Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTagRequest $request)
    {

        Tag::create([
            'name'=>$request->name
        ]);

        return redirect(route('tags.index'))->with('success','Tag Created Successfully');
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
    public function edit(Tag $tag)
    {

        return  view('tags.create')->with('tag',$tag);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagsRequest $request, Tag $tag)
    {
        $tag->update([
            'name' =>$request->name
        ]);


return redirect(route('tags.index'))->with('success','Tag Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        if($tag->posts->count() > 0)
        {
            return redirect(route(name: 'tags.index'))->with('error','Tag cannot be deleted because it is associated to some posts.');


        }

        $tag->delete();

        return redirect(route(name: 'tags.index'))->with('success','Tag Deleted Successfully');



    }
}
