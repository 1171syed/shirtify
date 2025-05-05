<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    
    public function index(){

        $categories = Category::all();
        return view('admin.category.index' , ['cats' => $categories]);
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required | string ',
            'slug'=> 'required | string ',
        ]);

        // create category
        Category::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ]);

        return redirect()->route('admin.cat')->with('success', 'Category created successfully');
    }


    public function destroy(Request $request, $id)
    {
        $cat = Category::findOrfail($id);
        
        // delete img 
        if($cat->photo_path && Storage::disk('public')->exists($cat->photo_path)){
            Storage::disk('public')->delete($cat->photo_path);
        }
        $cat->delete();

        return redirect()->route("admin.cat")->with('delete', "Post deleted Successfully");
    }

}