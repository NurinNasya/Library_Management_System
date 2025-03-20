<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Borrow;


class BorrowController extends Controller
{
    public function index()
    {
        // Ensure pagination is applied
        $books = Books::paginate(10); // Adjust the number per page as needed
    
        return view('borrowBook.mainBorrow', compact('books'));
    }

    public function index2()
    {
        $books = Books::leftJoin('borrows', 'books.id', '=', 'borrows.bookid')
            ->select('books.*', 'borrows.status')
            ->get();

        return view('borrowBook.mainborrow', compact('books'));
    }


    public function store(Request $request)
    {
        Borrow::create([
            'bookid' => $request->bookid,
            'borrower_name' => $request->borrower_name,
            'borrower_date' => now(),
            'return_date' => null,
            'status' => 'Borrowed', // Change status when borrowed
        ]);
    
        return back()->with('success', 'Book borrowed successfully!');
    }

    public function returnBook($id)
{
    $borrow = Borrow::findOrFail($id);
    $borrow->update([
        'return_date' => now(),
        'status' => 'Available' // Set back to Available when returned
    ]);

    return back()->with('success', 'Book returned successfully!');
}

    
    /*public function borrow($id)
    {
        $book = Books::findOrFail($id);
        if ($book->status == 'available') {
            $book->status = 'borrowed';
            $book->save();
            return redirect()->route('books.search')->with('success', 'Book borrowed successfully.');
        }
        return redirect()->route('books.search')->with('error', 'This book is already borrowed.');
    }

    public function return($id)
    {
        $book = Books::findOrFail($id);
        if ($book->status == 'borrowed') {
            $book->status = 'available';
            $book->save();
            return redirect()->route('books.search')->with('success', 'Book returned successfully.');
        }
        return redirect()->route('books.search')->with('error', 'This book is already available.');
    }*/
}