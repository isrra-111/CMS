<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class BlogPostsController extends Controller
{
    public function showSinglePost(Post $post)
    {
        return view('blog.show', compact('post'));
    }


    public function category(Category $category)
{
    $search = request()->query('search');
    if ($search) {
        $posts = $category->posts()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(7);
    } else {
        $posts = $category->posts()->paginate(3);
    }

    return view('blog.category')
        ->with('category', $category)
        ->with('posts', $posts)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
}


    public function tag(Tag $tag)
    {
         return view('blog.tag')
         ->with('tag',$tag)
         ->with('categories',Category::all())
         ->with('tags',Tag::all())
         ->with('posts',value: $tag->posts()->paginate(3));

    }

    public function search(Request $request)
{
    $search = $request->query('search');

    // Search across all posts or restrict it by a condition (e.g., category, tag)
    $posts = Post::where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->paginate(3);

    return view('blog.search')
        ->with('posts', $posts)
        ->with('search', $search)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
}

}
