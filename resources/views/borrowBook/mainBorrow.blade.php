
{{--<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6>Borrow & Return Books</h6>
                    <input type="text" class="form-control w-25" placeholder="Search book..." id="searchBook">
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Author</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($books as $book) --}}
                                <tr>
                                    {{-- <td class="text-dark">{{ $book->title }}</td> --}}
                                    {{-- <td class="text-dark">{{ $book->author }}</td> --}}
                                    <td class="text-center">
                                        {{-- @if($book->status == 'available') --}}
                                            {{-- <span class="badge badge-success">Available</span> --}}
                                        {{-- @else --}}
                                            {{-- <span class="badge badge-danger">Borrowed</span> --}}
                                        {{-- @endif --}}
                                    </td>
                                    <td class="text-center">
                                        {{-- @if($book->status == 'available') --}}
                                            {{-- <form method="POST" action="{{ route('books.borrow', $book->id) }}" style="display:inline;"> --}}
                                                {{-- @csrf --}}
                                                {{-- <button class="btn btn-primary btn-sm" type="submit"> --}}
                                                    {{-- <i class="fa fa-book"></i> --}}
                                                {{-- </button> --}}
                                            {{-- </form> --}}
                                        {{-- @else --}}
                                            {{-- <form method="POST" action="{{ route('books.return', $book->id) }}" style="display:inline;"> --}}
                                                {{-- @csrf --}}
                                                {{-- <button class="btn btn-success btn-sm" type="submit"> --}}
                                                    {{-- <i class="fa fa-undo"></i> --}}
                                                {{-- </button> --}}
                                            {{-- </form> --}}
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{-- {{ $books->links('pagination::bootstrap-4') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>--}}

{{--<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6>Borrow & Return Books</h6>
                    <input type="text" class="form-control w-25" placeholder="Search book..." id="searchBook">
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Author</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td class="text-dark">{{ $book->title }}</td>
                                    <td class="text-dark">{{ $book->author }}</td>
                                    <td class="text-center">
                                        @if($book->status == 'Available')
                                            <span class="badge badge-success text-white">Available</span>
                                        @else
                                            <span class="badge badge-danger text-white">Borrowed</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($book->status == 'Available')
                                            <form method="POST" action="{{ route('books.borrow', $book->id) }}" style="display:inline;">
                                                @csrf
                                                <button class="btn btn-primary btn-sm" type="submit">
                                                    <i class="fa fa-book"></i> Borrow
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('books.return', $book->id) }}" style="display:inline;">
                                                @csrf
                                                <button class="btn btn-success btn-sm" type="submit">
                                                    <i class="fa fa-undo"></i> Return
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $books->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>--}}

@extends('layouts.home')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6>Borrow & Return Books</h6>
                    <form method="GET" action="{{ route('borrow.index') }}">
                        <input type="text" class="form-control w-75" name="search" placeholder="Search book..." value="{{ request('search') }}">
                    </form>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Author</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td class="text-dark">{{ $book->title }}</td>
                                    <td class="text-dark">{{ $book->author }}</td>
                                    <td class="text-center">
                                        @if($book->status === 'Borrowed')
                                            <span class="badge badge-danger text-white">Borrowed</span>
                                        @else
                                            <span class="badge badge-success text-white">Available</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    @if($book->status !== 'Borrowed')
                                            <!-- Borrow Button (Redirects to borrow.blade.php) -->
                                            <a href="{{ route('borrow.form', ['bookid' => $book->id]) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-book"></i> Borrow
                                            </a>
                                        @else
                                        <form method="POST" action="{{ route('books.return', ['id' => $book->id]) }}" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-success btn-sm" type="submit">
                                                    <i class="fa fa-undo"></i> Return
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $books->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
