@extends('layouts.home')

@section('content')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fs-4">Book's Details</h5>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>

                <div class="card-body p-4">
                    <div class="row mb-3">
                        <div class="col-md-2 fw-bold" style="font-size: 1.25rem;">Title:</div>
                        <div class="col-md-10" style="font-size: 1.25rem;">{{ $book->title }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 fw-bold" style="font-size: 1.25rem;">Author:</div>
                        <div class="col-md-10" style="font-size: 1.25rem;">{{ $book->author }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 fw-bold" style="font-size: 1.25rem;">ISBN:</div>
                        <div class="col-md-10" style="font-size: 1.25rem;">{{ $book->isbn }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 fw-bold" style="font-size: 1.25rem;">Category:</div>
                        <div class="col-md-10" style="font-size: 1.25rem;">{{ $book->category }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 fw-bold" style="font-size: 1.25rem;">Published Year:</div>
                        <div class="col-md-10" style="font-size: 1.25rem;">{{ $book->published_year }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
