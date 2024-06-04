<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan website student
    public function index()
    {
        // tarik data student dari db
        $students = Student::all();

        // panggil view dan kirim data studenta
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }

    // method untuk menmapilkan form tambah student
    public function create()
    {
        return view('admin.contents.student.create');
    }

    // method untuk menyimpan data student baru
    public function store(Request $request)
    {
        // validasi request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);

        // simpan ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // kembali ke halaman student
        return redirect('/admin/student')->with('message', 'Data student berhasil ditambahkan!');
    }

    // method untuk menambahkan halaman edit
    public function edit($id)
    {
        // cari data berdasarkan id
        $student = Student::find($id); // select * FROM student WHERE id = $id; 

        return view('admin.contents.student.edit', [
            'student' => $student
        ]);
    }

    // method untuk menyimpan hasil update
    public function update($id, Request $request)
    {

        // cari data berdasarkan id
        $student = Student::find($id); // select * FROM student WHERE id = $id;

        // validasi request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // kembali ke halaman student
        return redirect('/admin/student')->with('message', 'Data student berhasil diedit!');
    }

    // method untuk menghapus student
    public function destroy($id)
    {
        // cari data berdasarkan id
        $student = Student::find($id); // select * FROM student WHERE id = $id;

        // hapus student
        $student->delete();

        // kembalikan ke halaman srudent
        return redirect('/admin/student')->with('message', 'Data student berhasil dihapus!');
    }
}
