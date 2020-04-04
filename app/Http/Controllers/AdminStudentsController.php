<?php

namespace App\Http\Controllers;

use App\Program;
use App\Student;
use Illuminate\Http\Request;

class AdminStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id', 'DESC')->get();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        $student = Student::latest()->first();
        $id = $student ? $student->id + 1 : 1;
        return view('admin.students.create', compact('programs', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'program' => 'required',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->program_id = $request->program;
        $student->save();
        return redirect()->route('students.index')->with('status', 'success')->with('message', 'Student has created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $programs = Program::all();
        return view('admin.students.edit', compact('student', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'program' => 'required',
        ]);

        $student->name = $request->name;
        $student->program_id = $request->program;
        $student->update();

        return redirect()->route('students.index')->with('status', 'success')->with('message', 'Student has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('status', 'success')->with('message', 'Student has deleted successfully');
    }
}
