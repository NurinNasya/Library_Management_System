@extends('layouts.home')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h6>Add Book Details</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                           <form method="post" enctype="multipart/form-data" action="{{ route('books.store') }}">
                                    @csrf
                                <div style="margin-bottom: 15px; margin-left: 50px">
                                    <label style="display: block; margin-bottom: 5px;">Title</label>
                                    <input type="text" name="title" placeholder="Title" style="width: 80%; padding: 4px;" />
                                </div>

                                <div style="margin-bottom: 15px; margin-left: 50px">
                                    <label style="display: block; margin-bottom: 5px;">Author</label>
                                    <input type="text" name="author" placeholder="Author" style="width: 80%; padding: 4px;" />
                                </div>

                                <div style="margin-bottom: 15px; margin-left: 50px">
                                    <label style="display: block; margin-bottom: 5px;">ISBN</label>
                                    <input type="text" name="isbn" placeholder="ISBN" style="width: 80%; padding: 4px;" />
                                </div>

                                <div style="margin-bottom: 15px; margin-left: 50px">
                                    <label style="display: block; margin-bottom: 5px;">Category</label>
                                    <select name="category" style="width: 80%; padding: 4px;" required>
                                        <option value="">-- Select Category --</option>
                                        <option value="Fantasy">Fantasy</option>
                                        <option value="Romance">Romance</option>
                                        <option value="Sci-Fi">Sci-Fi</option>
                                        <option value="">Horror</option>
                                        <option value="Fantasy">Thriller</option>
                                        <option value="Romance">Crime</option>
                                    </select>
                                </div>

                                <div style="margin-bottom: 15px; margin-left: 50px">
                                    <label style="display: block; margin-bottom: 5px;">Published Year</label>
                                    <input type="text" name="published_year" placeholder="Published Year" style="width: 80%; padding: 4px;" />
                                </div>

                                {{--<div>
                                    <button type="button" style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px; margin-left: 50px">Submit</button>
                                </div>--}}
                                <div>
                                    <button type="submit" style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px; margin-left: 50px">
                                        Submit
                                    </button>
                                </div>
                            </form>

                            <!-- Show success message -->
                            @if(session('success'))
                                <p style="color: green; margin-left: 50px;">{{ session('success') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
