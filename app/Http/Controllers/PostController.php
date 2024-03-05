<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    

    public function deletePost($id)
    {
        $post = Posts::find($id);
        if (!is_null($post)) {
            $post->delete();
        }
        return redirect()->back();
    }

    public function editPost($id)
    {
        $post = Posts::find($id);
        if (is_null($post)) {
            return redirect('show-dashboard-posts');
        } else {
            $title = "Edit Post";
            $url = url('/posts/update') . "/" . $id;
            return view('form-post', ['url' => $url, 'title' => $title, 'post' => $post]);
        }

    }

    public function updatePost($id, Request $request)
    {
  
   
        $validatedData=$request->validate([
            'title'=>'required',
            'content_text'=>'required',
            'status'=>'required|in:0,1,2',
      
        
        ]);

    
        $user_id = session()->get('user_id');
        $post = Posts::find($id);
        $post->title= $validatedData['title'];
        $post->user_id =$user_id;
        $post->content_text =$validatedData['content_text'];
        $post->status=$validatedData['status'];
        if(!is_null($request->file('image')))
        {
        $post->featured_image=$request->file('image')->store('uploads' , 'public');
        }
       
       if($post->save())
       {
        return redirect()->route('show-dashboard-posts');
       }

    }


    public function addPost()
    {

        $title = "Add Post";
        $url = url('/posts/add');
        return view('form-post', ['url' => $url, 'title' => $title   ]);
    }

    public function processAddPost(Request $request)
    {

$validatedData=$request->validate([
    'title'=>'required',
    'content_text'=>'required',
    'status'=>'required|in:0,1,2',
    'image'=>'required'
    

]);

        $post=new Posts();
        $user_id=session()->get('user_id');
        $post->title=$validatedData['title'];
        $post->user_id=$user_id;

        $post->content_text=$validatedData['content_text'];
        $post->status=$validatedData['status'];
        $post->featured_image=$request->file('image')->store('uploads' , 'public');
        $post->save();
        return redirect()->back()->with('message' ,'post added succesfully');
    }

}

