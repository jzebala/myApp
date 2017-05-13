<?php

use Illuminate\Database\Seeder;

use App\Post;
use App\Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post();
        $post->title = 'myApp - Pierwszy wpis!';
        $post->user_id = 1;
        $post->contents = "Dzień dobry, i cześć! to jest pierwszy wpis, życzę miłego korzystania z mojej aplikacji!";
        $post->publish = 1;
        $post->image = "default.png";
        $post->save();
        $post->categories()->attach([1, 2, 3]);
    }
}
