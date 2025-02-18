<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\blog;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.blogs.create', compact('categories'));
    }

    public function create(Request $request)
    {

        $blog = new blog();
        $blog->category_id = $request->category_id;
        $blog->email = $request->email;
        $blog->title = $request->title;
        $images = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
                $images[] = $filename;
            }
        }
        $blog->image = json_encode($images);

        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $blog->slug = $request->slug;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->save();
        return redirect()->route('blogs.table')->with('message', 'Blog created successfully');
    }

    public function show()
    {
        $blogs = blog::all();
        return view('backend.blogs.table', compact('blogs'));
    }

    public function edit($id)
    {
        $categories = category::all();
        $blog = blog::find($id);
        return view('backend.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $blog = blog::findOrFail($id);

        $blog->category_id = $request->category_id ?? $blog->category_id;
        $blog->email = $request->email ?? $blog->email;
        $blog->title = $request->title ?? $blog->title;
        $blog->description = $request->description ?? $blog->description;
        $blog->content = $request->content ?? $blog->content;
        $blog->status = $request->status ?? $blog->status;
        $blog->slug = $request->slug ?? $blog->slug;
        $blog->meta_title = $request->meta_title ?? $blog->meta_title;
        $blog->meta_description = $request->meta_description ?? $blog->meta_description;
        $blog->meta_keyword = $request->meta_keyword ?? $blog->meta_keyword;

        if ($request->hasFile('image')) {
            if (!empty($blog->image)) {
                $oldImages = json_decode($blog->image, true);
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path('uploads') . '/' . $oldImage;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            $images = [];
            foreach ($request->file('image') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
                $images[] = $filename;
            }
            $blog->image = json_encode($images);
        }

        $blog->save();

        return redirect()->route('blogs.table')->with('message', 'Blog updated successfully');
    }


    public function destroy($id)
    {
        $blog = blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.table')->with('message', 'Blog deleted successfully');
    }
}
