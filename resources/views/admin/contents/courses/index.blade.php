@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>Courses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"></li>
                <li class="breadcrumb-item">Courses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if (Auth::user()->role == 'admin')
                <a href="/admin/courses/create" class="btn btn-primary mt-4">+ Courses</a>
                @endif
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($courses as $index => $cou)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cou->name }}</td>
                            <td>{{ $cou->category }}</td>
                            <td>{{ $cou->desc }}</td>
                            <td>
                                <a href="/admin/courses/edit/{{ $cou->id }}"
                                    class="btn btn-warning me-2 d-inline-block">Edit</a>
                                <form action="/admin/courses/delete/{{ $cou->id }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                        
                </table>
            </div>
        </div>
    </section>
@endsection
