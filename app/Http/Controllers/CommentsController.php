<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comments;

use Session;
use Auth;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id){

        $this->validate($request, ['text' => 'required']);

        $comment = new Comments($request->all());
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->save();

        Session::flash('message', 'Komentarz został dodany.');
        return redirect('/wpis/' . $id . '/#comments');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $comment = Comments::withTrashed()->findOrFail($id);
        $post = Post::findOrFail($request->post);

        if(Auth::user()->hasRole('Admin')){
            $comment->forceDelete();
        }else{
            $comment->delete();
        }

        Session::flash('message', 'Komentarz został usunięty');

         return redirect('/wpis/' . $post->id . '/#comments');
    }
}
