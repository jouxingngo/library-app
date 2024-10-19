<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {    
        // Middleware role untuk mengatur akses
        $this->middleware(['role:admin','auth'])->only(['create', 'store','update','delete','edit']);
    }
    public function index(Request $request)
    {
      
    
        // Memeriksa otentikasi pengguna
        if (auth()->check() && auth()->user()->hasRole('admin')) {
            $books = Book::with('category')->get();
            return view('admin.book.index', compact('books')); 
        } else {
            $search = $request->get('search'); 
    
            $books = Book::with('category')
                ->when($search, function ($query, $search) {
                    return $query->where('title', 'like', "%{$search}%")
                                 ->orWhereHas('category', function ($query) use ($search) {
                                     $query->where('name', 'like', "%{$search}%");
                                 });
                })
                ->paginate(8);
            return view('user.book.index', compact('books', 'search')); 
        }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view("admin.book.create",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "author" => "required",
            "category_id" => "required",
            "image" => "mimes:png,jpg,jpeg|required|image",
            "description" => "string",
            "stock" => "required|integer|min:0"
        ]);
        
        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $filename);
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->stock = $request->input('stock');
        $book->category_id = $request->input('category_id');
        $book->image = $filename;
        $book->description = $request->input('description');

        $book->status = $book->stock > 0;

        $book->save();
        return redirect()->route("book.index")->with('success','Book Added');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findorFail($id);
   
        return view('user.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::get();
        return view("admin.book.edit", compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required",
            "author" => "required",
            "category_id" => "required",
            "image" => "mimes:png,jpg,jpeg|image",
            "description" => "string",
            "stock" => "required|integer|min:0"
        ]);

        $book = Book::findOrFail($id);
        if($request->has("image"))
        {
            $path = "images/";
            File::delete($path.$book->image);
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $filename);

            $book->image = $filename;
            $book->save();

            
        }
        $book->title = $request->input("title");
        $book->author = $request->input("author");
        $book->category_id = $request->input("category_id");
        $book->description = $request->input("description");
        $book->stock = $request->input("stock");
        $book->save();

        return redirect()->route("book.index")->with('success', 'Book Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        $path = "images/";
        File::delete($path . $book->image);
        
        
        $book->delete();
        
        return redirect()->route('book.index')->with('success', 'Book Deleted');
    }
}
