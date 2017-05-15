<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

use Session;
use Auth;
use Image;

use PDF;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('Admin')){
            // if user is admin
            $posts = Post::withTrashed()->orderBY('created_at', 'DESC')->paginate(5);
        }else{
            $posts = Post::where('user_id', Auth::user()->id)->orderBY('created_at', 'DESC')->paginate(5);
        }
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $post = new Post($request->all());
        $post->user_id = Auth::user()->id;

        $this->validate($request, ['title' => 'required', 'contents' => 'required', 'image' => 'mimes:jpeg,png,jpg|max:2048']);

        /*
        *   If the user does not select checkbox, variable does not exist.
        *   So set the 'publish' variable to 0 (don't publish)
        */
        if(!isset($request->publish)){
            $request->request->add(['publish' => 0]);
        }

        /* Store post image */
        if($request->hasFile('image')){
    		$image = $request->file('image');
            $filename = md5(uniqid(rand(), true)) . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save( public_path('/uploads/posts/' . $filename )); // Upload and resize image

    		$post->image = $filename;
    	}else{
            $post->image = 'default.png';
        }

        //return $request->all();

        /* Save post */
        $post->save($request->all());

        /* Save Categories */
        $categoryIds = $request->input('CategoryList');
        $post->categories()->attach($categoryIds);

        Session::flash('message', 'Nowy wpis został dodany.');
        return redirect('/posts');              
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->hasRole('Admin')){
            $post = Post::withTrashed()->findOrFail($id);
        }else{
            $post = Post::where('user_id', Auth::user()->id)->findOrFail($id);
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Generate pdf file.
     *
     * @param  int  $id
     * @return array    
    */
    public function pdf($id){
        $post = Post::findOrFail($id);
        $pdf = PDF::loadView('posts.pdf', ['post' => $post]);
        return $pdf->download($post->title . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id');
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['title' => 'required', 'contents' => 'required', 'image' => 'mimes:jpeg,png,jpg|max:2048']);


        $post = Post::findOrFail($id);
        $old_image = $post->image; // Get the old name avatar

        /*
        *   If the user does not select checkbox, variable does not exist.
        *   So set the 'publish' variable to 0 (don't publish)
        */
        if(!isset($request->publish)){
            $request->request->add(['publish' => 0]);
        }

        /* Update post */

        $post->update($request->all());

        /* Update post image */

        if($request->hasFile('image')){
    		$image = $request->file('image');
            $filename = md5(uniqid(rand(), true)) . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save( public_path('/uploads/posts/' . $filename )); // Upload and resize image

    		$post->image = $filename;
    		$post->save();

            // Delete old image from folder
            if($old_image != "default.png"){
                if(file_exists(public_path('/uploads/posts/' . $old_image))){
                    unlink(public_path('/uploads/posts/' . $old_image)); // Delete post image
                }
            }
    	}

        /* Update categories */
        $post->categories()->sync($request->input('CategoryList'));

        Session::flash('message', 'Treść wpisu został zmieniona.');
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        Session::flash('message', 'Post został usunięty');

        return redirect('/posts');
    }
}
