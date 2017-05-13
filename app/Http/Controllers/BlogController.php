<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\BlogConfig;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = BlogConfig::firstOrFail(); // get first config record.
        $posts = Post::latest()->orderBY('created_at', 'DESC')->paginate($config->pagination);
        return view('templates.myappblog.index', compact('posts', 'config'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = BlogConfig::firstOrFail(); // get first config record.
        $post = Post::findOrFail($id);
        if($post->publish != 0){
            return view('templates.myappblog.show', compact('post', 'config'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Search posts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $config = BlogConfig::firstOrFail(); // get first config record.
        $posts = Post::latest()->where('title', 'like', '%' . $request->search . '%')->get();
        return view('templates.myappblog.search', compact('config', 'posts'));
    }
}
