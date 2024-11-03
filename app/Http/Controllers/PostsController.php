<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(view: 'posts.index')->with('posts',Post::all());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostsRequest $request)
    {
        //upload the image to storage

        $imagePath = $request->file('image')->store('posts', 'public');
        /// create the post

        $post=Post::create([

            'title'=>$request->title,
            'description'=> $request->description,
            'content' => $request->content,
            'image'=>$imagePath,
            'published_at' => $request->published_at,
            'category_id'=>$request->category,
            'user_id'=>auth()->user()->id
        ]);

        if($request->tags)
        {
            $post->tags()->attach($request->tags);

        }

        return redirect()->route('posts.index')->with('success', value: 'Post Created Successfully.');



    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return view(view: 'posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data=$request->only(['title','description','published_at','content']);
        //check if new image

        if($request->hasFile('image'))
        {

            //upload it

            $imagePath = $request->file('image')->store('posts', 'public');

             //delete old one
            $post->deleteImage();

            $data['image']=$imagePath;
        }

        if($request->tags)
        {
            $post->tags()->sync($request->tags);
        }


        //update attribute

        $post->update($data);

        //redirect user

        return redirect()->route('posts.index')->with(key: 'success', value: 'Post Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $post=Post::withTrashed()->where('id',$id)->firstOrFail();


        if($post->trashed()){
            $post->deleteImage();
            $post->forceDelete();
        }
        else{
            $post->delete();
        }

        return redirect()->route('posts.index')->with(key: 'success', value: 'Post Deleted Successfully.');
    }

    public function trashed(){


        $trashed=Post::onlyTrashed()->get();

        return view('posts.index')->with('posts',$trashed)->with('success', value: 'Post Trashed Successfully.');

    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->firstOrFail();

        $post->restore();

        return view('posts.index')->with('success', value: 'Post Restored Successfully.');

    }
}
