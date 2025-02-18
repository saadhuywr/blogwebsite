<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\blog;
use App\Models\aboutme;
use App\Models\comment;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = category::all();
        $aboutme = aboutme::first();
        $blogs = blog::where('status', '1')->get();
        $recent_blogs = blog::orderBy('created_at', 'desc')->take(2)->get();
        return view('Frontend.index', compact('categories', 'blogs', 'recent_blogs', 'aboutme'));
    }

    public function singlePost($id)
    {
        $blog = blog::find($id);
        $categories = category::all();
        $images = json_decode($blog->image);
        $aboutme = aboutme::first();
        $recent_blogs = blog::orderBy('created_at', 'desc')->take(2)->get();
        // comment
        $comments = comment::where('blog_id', $id)->get();
        return view('Frontend.singlePost', compact('blog', 'images', 'categories', 'recent_blogs', 'aboutme', 'comments' ));
    }

    public function about()
    {
        $categories = category::all();
        $aboutme = aboutme::first();
        $recent_blogs = blog::orderBy('created_at', 'desc')->take(2)->get();
        return view('Frontend.about', compact('recent_blogs', 'categories', 'aboutme'));
    }

    public function category($name)
    {
        $categories = category::all();
        $category = category::where('name', $name)->first();
        $recent_blogs = blog::orderBy('created_at', 'desc')->take(2)->get();
        $aboutme = aboutme::first();

        $blogs = blog::where('category_id', $category->id)->get();

        if ($category) {

            $categories = category::all();
            $recent_blogs = blog::orderBy('created_at', 'desc')->take(2)->get();
            $aboutme = aboutme::first();
            $blogs = blog::where('category_id', $category->id)->get();

            return view('Frontend.category', compact('category', 'blogs', 'recent_blogs', 'aboutme', 'categories'));
        }
        return view('Frontend.category', compact('categories', 'recent_blogs', 'aboutme', 'blogs'));
    }
}
