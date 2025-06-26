<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required|max:250',
           
        ]);
        
    
        $post->comments()->create($validated);
        
        return back()->with(['success' => 'Comment Added Successfully']);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with(['success' => 'Comment Deleted Successfully']);
    }
}