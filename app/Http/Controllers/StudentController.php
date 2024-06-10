<?php

namespace App\Http\Controllers;

use App\Models\Courses;
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
        // mendaptkan data courses
        $courses = Courses::all();

        // panggil view
        return view('admin.contents.student.create', [
            'courses' => $courses
        ]);
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
            'course_id' => 'nullable',
        ]);

        // simpan ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'courses_id' => $request->course_id,
        ]);

        // kembali ke halaman student
        return redirect('/admin/student')->with('message', 'Data student berhasil ditambahkan!');
    }

    // method untuk menambahkan halaman edit
    public function edit($id)
    {
        
        // cari data berdasarkan id
        $student = Student::find($id); // select * FROM student WHERE id = $id; 
        $courses = Courses::all();
        return view('admin.contents.student.edit', [
            'student' => $student, 'courses' => $courses
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
            'courses_id' => 'nullable'
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'courses_id' => $request->courses_id,
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
