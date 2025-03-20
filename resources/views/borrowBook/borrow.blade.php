@extends('layouts.home')

@section('content')
<div class="container">
    <h3>Borrow Book: {{-- {{ $book->title }} --}} Book Title Here</h3>

    <form method="POST" action="#"> 
        {{-- Use the correct action URL when you're ready --}}
        {{-- action="{{ route('admin.books.borrow', $book->id) }}" --}}

        {{-- CSRF Token (Uncomment when submitting form to avoid CSRF errors) --}}
        {{-- @csrf --}}

        <div class="mb-3">
            <label for="borrower_name" class="form-label">Borrower Name</label>
            <input type="text" name="borrower_name" class="form-control" required>
            
            {{-- Validation Error Message (Uncomment when using form validation) --}}
            {{-- @error('borrower_name') --}}
            {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
            {{-- @enderror --}}
        </div>

        <div class="mb-3">
            <label for="borrow_date" class="form-label">Borrow Date</label>
            <input type="date" name="borrow_date" class="form-control" required>

            {{-- Validation Error Message (Uncomment when using form validation) --}}
            {{-- @error('borrow_date') --}}
            {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
            {{-- @enderror --}}
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Return Date</label>
            <input type="date" name="return_date" class="form-control" required>

            {{-- Validation Error Message (Uncomment when using form validation) --}}
            {{-- @error('return_date') --}}
            {{-- <div class="invalid-feedback">{{ $message }}</div> --}}
            {{-- @enderror --}}
        </div>

        {{-- Hidden field to set status as "borrowed" (Uncomment when handling status in database) --}}
        {{-- <input type="hidden" name="status" value="borrowed"> --}}

        <button type="submit" class="btn btn-success">Confirm Borrow</button>
    </form>
</div>
@endsection

