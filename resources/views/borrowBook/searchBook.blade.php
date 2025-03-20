@extends('layouts.home')

@section('content')
<div class="container">
    <h3>Search Books</h3>
    <form method="GET" action="#">
        <input type="text" name="query" class="form-control" placeholder="Search by Title, ISBN, or Author">
        <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>

    {{-- Commenting out dynamic data to prevent errors --}}
    {{-- @if(isset($books)) --}}
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($books as $book) --}}
            <tr>
                <td>Example Book Title</td>
                <td>Example Author</td>
                <td>
                    {{-- @if($book->status == 'available') --}}
                        <span class="badge bg-success">Available</span>
                    {{-- @else --}}
                        {{-- <span class="badge bg-danger">Borrowed</span> --}}
                    {{-- @endif --}}
                </td>
                <td>
                    {{-- @if($book->status == 'available') --}}
                        <a href="#" class="btn btn-primary">Borrow</a>
                    {{-- @else --}}
                        <a href="#" class="btn btn-warning">Return</a>
                    {{-- @endif --}}
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
    {{-- @endif --}}
</div>
@endsection
