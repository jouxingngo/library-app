<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {    
        // Middleware role untuk mengatur akses
        $this->middleware(['role:admin','auth'])->only(['create', 'store','update','delete','edit']);
    }
    
    
    public function index()
    {
        $categories = Category::with('books')->get();
        if (auth()->check() && auth()->user()->hasRole('admin')) {
            return view('admin.category.index', compact('categories')); 
        } else  {
            return view('user.category.index', compact('categories'));  
        }
    }


    public function create()
    {
        return view("admin.category.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'image' => "image|mimes:png,jpg,jpeg"
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images-category'), $filename);
        

        $category = new Category();
        $category->name = $request->name;
        $category->image = $filename;
        $category->save();

        return redirect('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with('books')->findOrFail($id);
        
    
        return view('user.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view("admin.category.edit",compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => "required",
            'image' => "image|mimes:png,jpg,jpeg"            
        ]);
        if($request->has("image"))
        {
            $path = "images-category/";
            File::delete($path.$category->image);
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images-category'), $filename);
            $category->image = $filename;
            
            $category->save();
            
        }
        $category->name = $request->name;
        $category->save();

        return redirect("category");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if ($category->books()->count() > 0) {
            return redirect()->back()->with('error', 'Category cannot be deleted because it has associated books.');
        }

        $category->delete();
            
        
        $path = "images-category/";
        File::delete($path . $category->image);
        $category->delete();
        return redirect("/category");
        
    }
}
