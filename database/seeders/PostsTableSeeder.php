<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create categories
         $category1 = Category::create(['name' => 'NEWS']);
         $category2 = Category::create(['name' => 'Design']);
         $category3 = Category::create(['name' => 'Product']);
         $category4 = Category::create(['name' => 'Marketing']);

         // Create or find authors
         $author1 = User::firstOrCreate(
             ['email' => 'johndoe@gmail.com'],
             ['name' => 'John Doe', 'password' => Hash::make('John123456')]
         );

         $author2 = User::firstOrCreate(
            ['email' => 'katifraniz@gmail.com'],
            ['name' => 'Kati Franiz', 'password' => Hash::make('Kati123456')]
        );

        // Create posts
        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Maecenas eu turpis rutrum, feugiat justo a, sollicitudin lorem.',
            'content' => 'Nulla et nibh facilisis, condimentum lorem et, laoreet enim.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author1->id,
        ]);

        $post2 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Maecenas eu turpis rutrum, feugiat justo a, sollicitudin lorem.',
            'content' => 'Nulla et nibh facilisis, condimentum lorem et, laoreet enim.',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg',
            'user_id' => $author2->id,
        ]);

        $post3 = Post::create([
            'title' => 'This is why it’s time to ditch dress codes at work',
            'description' => 'Maecenas eu turpis rutrum, feugiat justo a, sollicitudin lorem.',
            'content' => 'Nulla et nibh facilisis, condimentum lorem et, laoreet enim.',
            'category_id' => $category3->id,
            'image' => 'posts/5.jpg',
            'user_id' => $author1->id,
        ]);

        $post4 = Post::create([
            'title' => 'Congratulate and thank Maryam for joining our team',
            'description' => 'Maecenas eu turpis rutrum, feugiat justo a, sollicitudin lorem.',
            'content' => 'Nulla et nibh facilisis, condimentum lorem et, laoreet enim.',
            'category_id' => $category4->id,
            'image' => 'posts/4.jpg',
            'user_id' => $author2->id,
        ]);

        // Create tags
        $tag1 = Tag::create(['name' => 'Job']);
        $tag2 = Tag::create(['name' => 'Customers']);
        $tag3 = Tag::create(['name' => 'Design']);
        $tag4 = Tag::create(['name' => 'Progress']);

        // Attach tags to posts
        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id]);
        $post3->tags()->attach([$tag2->id, $tag3->id]);
        $post4->tags()->attach([$tag3->id, $tag4->id]);



    }
}
