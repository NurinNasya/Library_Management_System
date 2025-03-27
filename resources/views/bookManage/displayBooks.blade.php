@extends('layouts.home')

{{--<div class="container mt-4">
    <h2 class="mb-4">Book Management Dashboard</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Borrower</th>
                <th>Borrowed Date</th>
                <th>Return Date</th>
            </tr>
        </thead>
        <tbody>
           {{-- @foreach ($books as $index => $book)--}}
                <tr>
                    {{--<td>{{ $index + 1 }}</td>--}}
                    {{--<td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>--}}
                    {{--<td>{{ $book->borrower ? $book->borrower->name : 'Available' }}</td>
                    <td>{{ $book->borrowed_date ?? '-' }}</td>
                    <td>{{ $book->return_date ?? '-' }}</td>--}}
                </tr>
           {{-- @endforeach--}}
        </tbody>
    </table>
   {{-- {{ $books->links() }}--}} <!-- Pagination links -->
</div>--}}
{{--<div class="container mt-4">
    <h2 class="mb-4">Book Management Dashboard</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Borrower</th>
                <th>Borrowed Date</th>
                <th>Return Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $index => $book)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->borrow->borrower_name ?? 'Available' }}</td>
                    <td>{{ $book->borrow->borrowed_date ?? '-' }}</td>
                    <td>{{ $book->borrow->return_date ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No books available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination links -->
    {{ $books->links() }}
</div>--}}
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Borrowed Books Dashboard</h2>
    <table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Borrower Name</th>
            <th>Borrow Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->borrower_name ?? 'Not Borrowed' }}</td>
                <td>{{ $book->borrow_date ? \Carbon\Carbon::parse($book->borrow_date)->format('d M Y') : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

    <!-- Pagination links -->
    {{ $books->links() }}
</div>

@endsection