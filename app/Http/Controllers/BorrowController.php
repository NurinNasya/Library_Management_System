<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Borrow;


class BorrowController extends Controller
{
    public function index()
    {

        // Fetch books and include only active borrow records
        $books = Books::with(['borrow' => function ($query) {
            $query->whereNull('return_date'); // Only fetch active borrow records
        }])->paginate(10); // Adjust per page

        return view('borrowBook.mainBorrow', compact('books'));

        // Ensure pagination is applied
        /*$books = Books::paginate(10); // Adjust the number per page as needed
    
        return view('borrowBook.mainBorrow', compact('books'));*/
    }

    public function index2(Request $request)
        {
            $query = Books::leftJoin('borrows', 'books.id', '=', 'borrows.bookid')
                ->select('books.*', 'borrows.status');

            if ($request->has('search')) {
                $query->where('books.title', 'like', '%' . $request->search . '%')
                    ->orWhere('books.author', 'like', '%' . $request->search . '%');
            }

            $books = $query->paginate(10); // Adjust pagination as needed

            return view('borrowBook.mainborrow', compact('books'));
        }

        public function showBorrowForm(Request $request)
        {
            $bookid = $request->query('bookid'); 
            $book = Books::find($bookid);

            if (!$book) {
                return redirect()->route('borrow.index')->with('error', 'Book not found.');
            }

            return view('borrowBook.borrow', compact('book')); 
        }


    public function store(Request $request)
    {
                // Debugging: Check what data is being received
                //\Log::info('Borrow Request Data:', $request->all());

                // Validate input
                $validated = $request->validate([
                    'bookid' => 'required|exists:books,id',
                    'borrower_name' => 'required|string|max:255',
                ]);
        
                // Check if book is already borrowed
                $existingBorrow = Borrow::where('bookid', $validated['bookid'])
                    ->whereNull('return_date')
                    ->first();
        
                if ($existingBorrow) {
                    return back()->with('error', 'This book is already borrowed!');
                }
        
                // Create the borrow record
                Borrow::create([
                    'bookid' => $validated['bookid'],
                    'borrower_name' => $validated['borrower_name'],
                    'borrower_date' => now(),
                    'return_date' => null,
                    'status' => 'Borrowed',
                ]);

        
                return redirect()->route('borrow.index')->with('success', 'Book borrowed successfully!');
        
        // Check if book is already borrowed
        /*$existingBorrow = Borrow::where('bookid', $request->bookid)->whereNull('return_date')->first();
    
        if ($existingBorrow) {
            return back()->with('error', 'This book is already borrowed!');
        }
    
        Borrow::create([
            'bookid' => $request->bookid,
            'borrower_name' => $request->borrower_name,
            'borrower_date' => now(),
            'return_date' => null,
            'status' => 'Borrowed',
        ]);
    
        return back()->with('success', 'Book borrowed successfully!');*/
    }

    public function returnBook($id)
    {
        $borrow = Borrow::where('bookid', $id)->whereNull('return_date')->firstOrFail();
        
        $borrow->update([
            'return_date' => now(),
            'status' => 'Available'
        ]);
    
        return redirect()->route('borrow.main')->with('success', 'Book returned successfully!');

    }
    
    /*public function index2() <--original
    {
        $books = Books::leftJoin('borrows', 'books.id', '=', 'borrows.bookid')
            ->select('books.*', 'borrows.status')
            ->get();

        return view('borrowBook.mainborrow', compact('books'));
    }*


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
    }*

    public function returnBook($id)
{
    $borrow = Borrow::findOrFail($id);
    $borrow->update([
        'return_date' => now(),
        'status' => 'Available' // Set back to Available when returned
    ]);

    return back()->with('success', 'Book returned successfully!');
}*/ //original

    
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