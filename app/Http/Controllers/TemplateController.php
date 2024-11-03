<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $search=request()->query('search');
        if($search)
        {
               $post=Post::where('title','LIKE',"%{$search}%")->paginate(3);
         }
         else{
            $posts=Post::paginate(6);
         }
        return view('welcome')
        ->with('categories',Category::all())
        ->with('tags',Tag::all())
        ->with('posts',$posts);
    }
}
