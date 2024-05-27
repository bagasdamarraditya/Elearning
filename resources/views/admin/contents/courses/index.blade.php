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
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($courses as $cou)
                        <tr>
                            <td>1</td>
                            <td>{{ $cou->name }}</td>
                            <td>{{ $cou->category }}</td>
                            <td>{{ $cou->desc }}</td>
                            <td>
                                <a href="#" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                        
                </table>
            </div>
        </div>
    </section>
@endsection
