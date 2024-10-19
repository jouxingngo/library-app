<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class LoanController extends Controller
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

        if (!auth()->check()) {
            return redirect()->to('/loan_null');
        }
    
        if (auth()->user()->hasRole('admin')) {
            $loans = Loan::latest()->with(['user', 'book'])->get();
            return view('admin.loan.index', compact('loans'));
        } else {
            $loans = Loan::latest()->where('user_id', auth()->id())->with(['user', 'book'])->get();
            return view('user.loan.index', compact('loans'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::Role('user')->get();
        $books = Book::all();

        return view('admin.loan.create', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => "required",
            'book_id' => "required|exists:books,id",
            'loan_date' => "required"
        ]);
        $book = Book::find($request->book_id);
        if ($book->stock <= 0) {
            return back()->withErrors(['book_id' => 'Book stock not available.'])->withInput();
        }
        $loan = new Loan();
        $loan->user_id = $request->input('user_id');
        $loan->book_id = $request->input('book_id');
        $loan->loan_date = $request->input('loan_date');
        $loan->return_date = null;
        $loan->save();

        $book->stock--;
        $book->save();

        return redirect()->route('loan.index')->with('success', "Loan Added");
    }


    // return function
    public function return($id){
        $loan = Loan::findOrFail($id);
        if (is_null($loan->return_date)) {

            $loan->return_date = now();
            $book = $loan->book;

            $book->stock++;
            $book->save();

            $loan->save();

            return redirect()->route('loan.index')->with('success', 'Book Returned Successfull');
        }
        return redirect()->route('loans.index')->withErrors(['error' => 'This book has already been returned.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loan = Loan::findOrFail($id);
        return view('user.loan.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $users = User::Role('user')->get();
        $books = Book::all();
        $loan = Loan::findOrFail($id);

        return view('admin.loan.edit', compact('users', 'books','loan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => "required",
            'book_id' => "required|exists:books,id",
            'loan_date' => "required"
        ]);

        $loan = Loan::findOrFail($id);
        $loan->user_id = $request->input('user_id');
        $loan->book_id = $request->input('book_id');
        $loan->loan_date = $request->input('loan_date');
        $loan->return_date = $request->input('return_date');
        $loan->save();

        return redirect()->route('loan.index')->with('success', "Loan Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loan = Loan::findOrFail($id);

        if (is_null($loan->return_date)) {
            return redirect()->route('loan.index')->with('error', 'Cannot delete this loan because it has not been returned yet.');
        }
    
        $loan->delete();
        return redirect()->route('loan.index')->with('success', 'Loan Deleted');
    }


}
