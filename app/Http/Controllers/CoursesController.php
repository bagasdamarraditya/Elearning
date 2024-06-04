<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // Menampilkan data courses dari database
    public function index(){
        // mendapatkan data dari table courses
        $courses = Courses::all();

        // kirim data ke view untuk ditampilkan
        return view('admin.contents.courses.index',[
            'courses' => $courses
        ]);
    }

    // method untuk menampilkan form tambah courses
    public function create()
    {
        return view('admin.contents.courses.create');
    }

    // method untuk menyimpan data courses baru
    public function store(Request $request)
    {
        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan ke database
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembali ke halaman courses
        return redirect('/admin/courses')->with('message', 'Data courses berhasil ditambahkan!');
    }

     // method untuk menambahkan halaman edit
     public function edit($id)
     {
         // cari data berdasarkan id
         $courses = courses::find($id); // select * FROM courses WHERE id = $id; 
 
         return view('admin.contents.courses.edit', [
             'courses' => $courses
         ]);
     }

         // method untuk menyimpan hasil update
    public function update($id, Request $request)
    {
        // cari data berdasarkan id
        $courses = courses::find($id); // select * FROM courses WHERE id = $id; 

        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan perubahan
        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembali ke halaman courses
        return redirect('/admin/courses')->with('message', 'Data courses berhasil diedit!');
    
    }

    // method untuk menghapus courses
    public function destroy($id)
    {
        // cari data berdasarkan id
        $courses = courses::find($id); // select * FROM courses WHERE id = $id; 

        // hapus student
        $courses->delete();

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('message', 'Data courses berhasil dihapus!');
    }
}
