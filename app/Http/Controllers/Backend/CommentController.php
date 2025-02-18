<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request, $id){

        $comment = new comment();
        $comment->blog_id = $id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;

        return redirect()->back('')->with('success', 'Comment added successfully.');
    }
}
