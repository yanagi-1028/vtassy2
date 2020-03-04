<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
            ]);
        $comment = new Comment(['body' => $request->body]);
        $post = Post::findOrFail($postId);
        
        $post->comments()->save($comment);
        
        
        return redirect()->action('PostController@show',$post->id);
    }
}