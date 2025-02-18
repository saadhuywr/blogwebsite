<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    // public function index(){
    //     $comments = DB::table('comments')->paginate(5);
    //     return view('backend.comment.index', compact('comments'));
    // }

    public function store(Request $request){

        DB::table('comments')->insert([
            'blog_id' => $request->blog_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);

        return redirect()->route('post.show', $request->blog_id)->with('success', 'Comment added successfully.');
    }

    public function destroy(Request $request, $id){
        DB::table('comments')->where('id', $id)->delete();
        return redirect()->route('post.show', $request->blog_id)->with('success', 'Comment deleted successfully.');
    }
}
