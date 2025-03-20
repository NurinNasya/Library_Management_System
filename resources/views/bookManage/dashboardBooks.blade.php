@extends('layouts.home')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h6>Table Books</h6>
                    <a href="{{ route('addbooks') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Book
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">
                        <table class="table table-bordered align-items-center mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">ID</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Title</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Author</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">ISBN</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Category</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Published Year</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $index => $book)
                                <tr>
                                    <td class="text-center text-dark px-3">{{ $loop->iteration + ($books->firstItem() - 1) }}</td> <!-- Auto-increment ID -->
                                    <td class="text-center text-dark px-3">{{ $book->title }}</td>
                                    <td class="text-center text-dark px-3">{{ $book->author }}</td>
                                    <td class="text-center text-dark px-3">{{ $book->isbn }}</td>
                                    <td class="text-center text-dark px-3">{{ $book->category }}</td>
                                    <td class="text-center text-dark px-3">{{ $book->published_year }}</td>
                                    <td class="text-center px-3">
                                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $books->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
