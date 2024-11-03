<?php

use App\Http\Controllers\Blog\BlogPostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TemplateController::class,'index'])->name('welcome');

Route::get('showPost/{post}', [BlogPostsController::class, 'showSinglePost'])->name('blog.showSinglePost');

Route::get('blog.categories/{category}',[BlogPostsController::class, 'category'])->name('blog.category');

Route::get('blog.tags/{tag}',[BlogPostsController::class, 'tag'])->name('blog.tag');

Route::get('/search', [BlogPostsController::class, 'search'])->name('posts.search');


Route::middleware('auth')->group(function(){

Route::resource('categories',CategoriesController::class);

Route::resource(name: 'posts',controller: PostsController::class);

Route::get('trashed-posts',[ PostsController::class,'trashed'])->name('trashed-posts.index');

Route::put('restore-post/{post}',[ PostsController::class,'restore'])->name('restore-posts');

Route::resource('tags',TagsController::class);
});

Route::middleware('auth')->group(function(){

    Route::get('users/profile/edit',[UsersController::class,'edit'])->name('users.edit-profile');

    Route::put('users/profile',[UsersController::class,'update'])->name('users.update-profile');

    Route::get('/users',[UsersController::class,'index'])->name('users.index');

    Route::post('users/{user}/make-admin',[UsersController::class,'makeAdmin'])->name('users.make-admin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('users/profile', [UsersController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
