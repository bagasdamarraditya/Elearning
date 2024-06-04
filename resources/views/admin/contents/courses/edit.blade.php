@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>Edit Courses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Courses</li>
                <li class="breadcrumb-item">Edit Courses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/courses/update/{{ $courses->id }}" method="POST" class="mt-3">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $courses->name ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label for="category" class="form-label">Kategori</label>
                        <input type="text" name="category" id="category" class="form-control" value="{{ $courses->category ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label for="desc" class="form-label">Deskripsi</label>
                        <input type="text" name="desc" id="desc" class="form-control" value="{{ $courses->desc ?? '' }}">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
