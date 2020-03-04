<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Storage;

class PostController extends Controller
{
    public function add()
    {
        return view('/post/create');
    }
    public function create(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable',
            ]);
        $post = new Post;
        $form = $request->all();
        $post->user_id = Auth::user()->id;
        $post->title = $validate['title'];
        $post->content = $validate['content'];
        
        if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $post->image_path = basename($path);
      } else {
          $post->image_path = null;
      }
      
     
        $post->save();
        
     
        return redirect('post/front');
        
    }
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(3);
        
        if (count($posts) >0) {
            $headline = $posts->shift();
        }else {
            $headline = null;
        }
        return view('/front', ['headline' => $headline, 'posts'=> $posts]);
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        
        return view('post.show', ['post' => $post]);
    }
    public function edit(Request $request, Post $post)
    {
        
        $post = Post::find($request->id);
         if(empty($post)){
             abort(404);
         }
         return view('post.edit', ['post_form' => $post]);
    }
    public function update(Request $request, Post $post)
    {

        $this->validate($request, Post::$rules);
        
        $post = Post::find($request->id);
        
        $post_form = $request->all();
         if(isset($post_form['image'])){
             $path = $request->file('image')->store('public/image');
             $post->image_path = basename($path);
             unset($post_form['image']);
         }elseif(isset($request->remove)){
             $post->image_path = null;
             unset($post_form['remove']);
         }
        
        unset($post_form['_token']);
        
        $post->fill($post_form)->save();
        
        return redirect('post/front');
    }
    
    public function delete(Request $request, Post $post)
    {
        
        $post = Post::find($request->id);
        
        $post->delete();
        return redirect('post/front');
    }
    
    public function __construct()
    {
        $this->middleware('auth')->only(['edit,update,delete']);
        
        $this->middleware('verified')->only('create');
 
    }
}