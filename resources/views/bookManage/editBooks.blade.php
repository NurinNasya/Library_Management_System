@extends('layouts.home')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h6>Edit Book Details</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <!-- Corrected Form -->
                        <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div style="margin-bottom: 15px; margin-left: 50px">
                                <label style="display: block; margin-bottom: 5px;">Title</label>
                                <input type="text" name="title" value="{{ old('title', $book->title) }}" placeholder="Title" style="width: 80%; padding: 4px;" required />
                            </div>

                            <div style="margin-bottom: 15px; margin-left: 50px">
                                <label style="display: block; margin-bottom: 5px;">Author</label>
                                <input type="text" name="author" value="{{ old('author', $book->author) }}" placeholder="Author" style="width: 80%; padding: 4px;" required />
                            </div>

                            <div style="margin-bottom: 15px; margin-left: 50px">
                                <label style="display: block; margin-bottom: 5px;">ISBN</label>
                                <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" placeholder="ISBN" style="width: 80%; padding: 4px;" required />
                            </div>

                            <div style="margin-bottom: 15px; margin-left: 50px">
                                <label style="display: block; margin-bottom: 5px;">Category</label>
                                <input type="text" value="{{ $book->category }}" style="width: 80%; padding: 4px;" readonly />
                            </div>

                            <div style="margin-bottom: 15px; margin-left: 50px">
                                <label style="display: block; margin-bottom: 5px;">Published Year</label>
                                <input type="text" name="published_year" value="{{ old('published_year', $book->published_year) }}" placeholder="Published Year" style="width: 80%; padding: 4px;" required />
                            </div>

                            <div>
                                <button type="submit" style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px; margin-left: 50px">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
