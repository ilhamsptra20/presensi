<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();

        return view('dashboard.student', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'nis' => 'required|min:8|max:8|numeric' ,
            'name' => 'required|min:3' ,
            'rombel_id' => 'required|min:1' ,
            'rayon_id' => 'required|min:1' ,
            'username' => 'required|min:3|unique:students,username' ,
            'email' => 'required|min:3|unique:students,email' ,
            'password' => 'required|min:6' ,
        ]);

        $attr['password'] = bcrypt($request->password);

        Student::create($attr);

        return back()->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $attr = $request->validate([
            'nis' => 'required|min:8|max:8|numeric' ,
            'name' => 'required|min:3' ,
            'rombel_id' => 'required|min:1' ,
            'rayon_id' => 'required|min:1' ,
            'username' => 'required|min:3|unique:students,username' ,
            'email' => 'required|min:3|unique:students,email' ,
            'password' => 'required|min:6' ,
        ]);

        $attr['password'] = bcrypt($request->password);

        $student->create($attr);

        return back()->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('success');
    }
}
