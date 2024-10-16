<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get("/", [BookController::class, 'index']);


Route::middleware(['role:admin', 'auth'])->group(function () {
    Route::get('admin', function () {
        return view("admin.index");
    });
});
Route::resource('book', BookController::class);
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::resource('category', CategoryController::class);



require __DIR__.'/auth.php';
