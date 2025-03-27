<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return redirect('/login'); // Redirect to login page on startup
});
Route::post('/logout', function () {
    session()->flush(); // Clears all session data
    return redirect('/login')->with('success', 'Logged out successfully!');
})->name('logout');

Route::get('/login', function () {
    return view('auth.login'); // Ensure this file exists
})->name('login');

//Route::view('/login', 'auth.login')->name('login');

//purely view
//Route::view('/login', 'auth.login')->name('login');
//Route::view('/addbooks', 'bookManage.addBooks')->name('addbooks');
Route::view('/editbooks', 'bookManage.editBooks')->name('editbooks');
//Route::view('/viewbooks', 'bookManage.viewBooks')->name('viewbooks');
//Route::view('/dashboard', 'bookManage.dashboardBooks')->name('dashboard');
Route::view('/mainborrow', 'borrowBook.mainBorrow')->name('mainborrow');
Route::view('/searchbook', 'borrowBook.searchBook')->name('searchbook');
Route::view('/borrow', 'borrowBook.borrow')->name('borrow');
Route::view('/return', 'borrowBook.return')->name('return');
Route::view('/borrowpage', 'borrowBook.borrowpage')->name('borrowpage');
Route::view('/display', 'bookManage.displayBooks')->name('display');

//sidebar
Route::get('/dashboard', [BooksController::class, 'index'])->name('dashboard');
Route::get('/mainborrow', [BorrowController::class, 'index'])->name('mainborrow');
Route::get('/books', [BooksController::class, 'index2'])->name('displayBooks');

//login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Use controller for book management
Route::get('/dashboard', [BooksController::class, 'index'])->name('dashboard'); // Display books
Route::get('/addbooks', [BooksController::class, 'create'])->name('addbooks'); // Show add book form
Route::post('/books/store', [BooksController::class, 'store'])->name('books.store'); // Handle book submission
Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show'); // View a single book
Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BooksController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('books.destroy'); // Delete a book
Route::get('/book-dashboard', [BooksController::class, 'dashboard'])->name('book-dashboard');

//book borrow return
Route::get('/borrow', [BorrowController::class, 'index2'])->name('borrow.index');
Route::get('/borrow/form', [BorrowController::class, 'showBorrowForm'])->name('borrow.form');
Route::post('/borrow/{bookid}', [BorrowController::class, 'store'])->name('borrow.store');
//Route::post('/borrow/store', [BorrowController::class, 'store'])->name('borrow.book');
//Route::get('/books/return', [BooksController::class, 'returnBook'])->name('books.return');
Route::get('/books/{id}/return', [BooksController::class, 'showReturnForm'])->name('books.return.view'); 
Route::put('/books/{id}/return', [BooksController::class, 'returnBook'])->name('books.return');
Route::get('/borrow/main', [BorrowController::class, 'index'])->name('borrow.main');




