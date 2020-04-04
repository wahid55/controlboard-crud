<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminFacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::orderBy('id', 'DESC')->get();
        return view('admin.faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.faculties.create', compact('departments'));
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
            'code' => 'required|alpha|unique:faculties',
            'department' => 'required'
        ]);

        $faculty = new Faculty();
        $faculty->name = $request->name;
        $faculty->code = $request->code;
        $faculty->department_id = $request->department;
        $faculty->save();
        return redirect()->route('faculties.index')->with('status', 'success')->with('message', 'Faculty has created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('admin.faculties.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);
        $departments = Department::all();
        return view('admin.faculties.edit', compact('faculty', 'departments'));
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
        $faculty = Faculty::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'code' => [
                'required',
                'alpha',
                Rule::unique('faculties')->ignore($faculty->id)
            ],
            'department' => 'required'
        ]);

        $faculty->name = $request->name;
        $faculty->code = $request->code;
        $faculty->department_id = $request->department;
        $faculty->update();

        return redirect()->route('faculties.index')->with('status', 'success')->with('message', 'Faculty has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        return redirect()->route('faculties.index')->with('status', 'success')->with('message', 'Faculty has deleted successfully');
    }
}
