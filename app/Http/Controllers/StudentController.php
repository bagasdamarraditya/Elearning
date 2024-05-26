<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan website student
    public function index(){
        // tarik data student dari db
        $students = Student::all();

        // panggil view dan kirim data studenta
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }
}
