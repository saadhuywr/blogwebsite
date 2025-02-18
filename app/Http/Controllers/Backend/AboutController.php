<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\aboutme;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('backend.about.form');
    }

    public function create(Request $request)
    {

        $about = new aboutme();


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $about->image = $filename;
        }

        $about->name = $request->name;
        $about->about_me = $request->about_me;
        $about->small_description = $request->small_description;
        $about->description = $request->description;
        $about->facebook = $request->facebook;
        $about->twitter = $request->twitter;
        $about->instagram = $request->instagram;
        $about->whatsapp = $request->whatsapp;

        $about->save();

        return redirect()->route('about.table')->with('message', 'About Me created successfully');
    }

    public function show()
    {
        $abouts = aboutme::all();
        return view('backend.about.table', compact('abouts'));
    }

    public function edit($id)
    {
        $about = aboutme::find($id);
        return view('backend.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = aboutme::find($id);

        $about->name = $request->name;
        $about->about_me = $request->about_me;
        $about->small_description = $request->small_description;
        $about->description = $request->description;
        $about->facebook = $request->facebook;
        $about->twitter = $request->twitter;
        $about->instagram = $request->instagram;
        $about->whatsapp = $request->whatsapp;

        if ($request->hasFile('image')) {
            if ($about->image && file_exists(public_path('uploads/' . $about->image))) {
                unlink(public_path('uploads/' . $about->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $about->image = $filename;
        }

        $about->save();

        return redirect()->route('about.table')->with('message', 'About Me updated successfully');
    }


    public function destroy($id)
    {
        $about = aboutme::find($id);
        $about->delete();
        return redirect()->route('about.table')->with('message', 'About Me deleted successfully');
    }
}
