@extends('layouts.home')

@section('content')
<div class="container">
    <h3>Borrow Book: {{ $book->title }}</h3> {{-- ✅ Displays the selected book title --}}

    <form method="POST" action="{{ route('borrow.form', ['bookid' => $book->id]) }}">
        @csrf  {{-- ✅ CSRF protection --}}
        
        {{-- ✅ Hidden field to track which book is being borrowed --}}
        <input type="hidden" name="bookid" value="{{ $book->id }}">

        <div class="mb-3">
            <label for="borrower_name" class="form-label">Borrower Name</label>
            <input type="text" name="borrower_name" class="form-control" required>
            
            @error('borrower_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="borrow_date" class="form-label">Borrow Date</label>
            <input type="date" name="borrow_date" class="form-control" value="{{ now()->format('Y-m-d') }}" required>

            @error('borrow_date')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Return Date</label>
            <input type="date" name="return_date" class="form-control" required>

            @error('return_date')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- ✅ Hidden field for status --}}
        <input type="hidden" name="status" value="Borrowed">

        <button type="submit" class="btn btn-success">Confirm Borrow</button>
    </form>
</div>
@endsection

