@extends('layouts.home')

@section('content')
<div class="container">
    <h3>Return Book: {{ $book->title }}</h3>

    <p><strong>Borrowed By:</strong> {{ $book->borrower_name }}</p>
    <p><strong>Borrow Date:</strong> {{ $book->borrow_date }}</p>

    <form method="POST" action="{{ route('books.return', $book->id) }}">
    @csrf
    @method('PUT') {{-- This ensures Laravel sends a PUT request --}}

    <button type="submit" class="btn btn-warning">Confirm Return</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
</form>

</div>
@endsection
