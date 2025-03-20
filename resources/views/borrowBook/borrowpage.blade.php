@extends('layouts.home')

@section('content')
<div class="container">
    <h3>All Borrowed Books</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Book</th>
                <th>Borrower</th>
                <th>Borrow Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($borrowedBooks as $book) --}}
            <tr>
                <td>Book Title Here {{-- {{ $book->title }} --}}</td>
                <td>Borrower Name Here {{-- {{ $book->borrower_name }} --}}</td>
                <td>YYYY-MM-DD {{-- {{ $book->borrow_date }} --}}</td>
                <td>
                    <a href="#" class="btn btn-warning">Return</a>
                    {{-- <a href="{{ route('admin.books.return', $book->id) }}" class="btn btn-warning">Return</a> --}}
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@endsection
