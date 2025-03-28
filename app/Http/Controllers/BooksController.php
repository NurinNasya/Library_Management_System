<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Borrow;


class BooksController extends Controller
{
    
    public function index()
    {
        $books = Books::paginate(10); // Paginate instead of using all()
        return view('bookManage.dashboardBooks', compact('books'));
    }

    public function index2()
    {
            // Ensure books are retrieved with the borrow relationship
        $books = Books::with('borrow')->paginate(10); 
        return view('bookManage.displayBooks');
    }

    public function index3()
    {
        $books = Books::paginate(10);

        // Attach borrowing status to each book
        foreach ($books as $book) {
            $borrowRecord = Borrow::where('book_id', $book->id)->latest()->first();
            $book->status = $borrowRecord ? $borrowRecord->status : 'available';
        }

        return view('books.mainborrow', compact('books'));
    }

       /* public function display()
    {
        // Ensure books are retrieved with the borrow relationship
        $books = Books::with('borrow')->paginate(10); 

        return view('bookManage.displayBooks', compact('books')); // Pass books to view
    }*/

    public function create(){
        return view('bookManage.addBooks');
    }

        public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|string|unique:books',
            'category' => 'required|string',
            'published_year' => 'required|numeric',
        ]);
        // Create a new book record
        $book = new Books();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->isbn = $request->input('isbn');
        $book->category = $request->input('category');
        $book->published_year = $request->input('published_year');

        $book->save();

        return redirect()->route('dashboard')->with('success', 'Book added successfully!');
    }

        public function show($id)
        {
            $book = Books::findOrFail($id); // Get the book details
            return view('bookManage.viewBooks', compact('book')); // Pass to view
        }

        public function edit($id)
        {
            $book = Books::findOrFail($id);
            return view('bookManage.editBooks', compact('book'));
        }
    
        public function update(Request $request, $id)
        {
            $book = Books::findOrFail($id);
    
            // Validate request
            $validated = $request->validate([
                'title' => 'required|string',
                'author' => 'required|string',
                'isbn' => 'required|string|unique:books,isbn,'.$id, // Allow existing ISBN
                'published_year' => 'required|numeric',
            ]);
    
            // Update book details
            $book->update($validated);
    
            return redirect()->route('dashboard', $book->id)->with('success', 'Book updated successfully!');
        }

        // Delete a book
        public function destroy($id)
        {
            $book = Books::findOrFail($id);
            $book->delete();
            return redirect()->route('dashboard')->with('success', 'Book deleted successfully!');
        }

                public function showReturnForm($id)
        {
            $book = Books::findOrFail($id); // Find the book
            return view('borrowBook.return', compact('book')); // Load return.blade.php
        }

        public function returnBook($id)
        {
            // Find the latest borrow record for the book
            $borrow = Borrow::where('bookid', $id)->latest()->first(); 
        
            if ($borrow) {
                // Mark the borrow record as returned
                $borrow->status = 'returned'; // Adjust the status based on your system
                $borrow->save();
            }
        
            return redirect()->route('books.return', ['id' => $id])->with('success', 'Book returned successfully.');
        }

        /*public function returnBook($id)
        {
            $book = Books::findOrFail($id);
        
            // Mark book as returned
            $book->status = 'available'; // Assuming 'available' means it's returned
            $book->borrower_name = null; // Clear borrower info if needed
            $book->borrow_date = null;
            $book->save();
        
            return redirect()->route('books.index')->with('success', 'Book returned successfully.');
        }*/
}