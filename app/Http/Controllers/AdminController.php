<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $userCount = User::role('user')->count();
        $categoryCount = Category::count();
        $bookCount = Book::count();
        $totalLoanCount = Loan::count();
        $loanCount = Loan::where('return_date', null)->count();

        return view('admin.index', compact('userCount', 'categoryCount','totalLoanCount', 'bookCount', 'loanCount'));
        
    }
}
