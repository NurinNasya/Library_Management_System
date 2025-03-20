@extends('layouts.home')

@section('content')
<div class="container mt-4">
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
</div>
@endsection