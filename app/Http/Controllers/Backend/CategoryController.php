<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('backend.categories.create');
    }

    public function create(Request $request){
        $category = new category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.table')->with('success','Category Added Successfully');
    }

    public function show(){
        $categories = category::all();
        return view('backend.categories.table',compact('categories'));
    }

    public function edit($id){
        $category = category::find($id);
        return view('backend.categories.edit',compact('category'));
    }

    public function update(Request $request, $id){
        $category = category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.table')->with('success','Category Updated Successfully');
    }

    public function destroy($id){
        $category = category::find($id);
        $category->delete();
        return redirect()->route('category.table')->with('success','Category Deleted Successfully');
    }
}
