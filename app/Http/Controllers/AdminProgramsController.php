<?php

namespace App\Http\Controllers;

use App\Department;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::orderBy('name', 'ASC')->get();
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.programs.create', compact('departments'));
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
            'name' => 'required|string|max:255|unique:programs',
            'department' => 'nullable'
        ]);


        $program = new Program();
        $program->name = $request->name;

        if($request->get('department') == '0') {
            $program->save();
        } else {
            $department = Department::findOrFail($request->department);
            $department->programs()->save($program);
        }


        return redirect()->route('programs.index')->with('status', 'success')->with('message', 'Program has created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $departments = Department::all();
        return view('admin.programs.edit', compact('program', 'departments'));
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
        $program = Program::findOrFail($id);

        $this->validate($request, [
            'name'          => [
                'required',
                'string',
                'max:255',
                Rule::unique('programs')->ignore($program->id)
            ],
            'department' => 'nullable'
        ]);

        $program->name = $request->name;


        if($request->get('department') == '0') {
            $program->update();
        } else {
            $department = Department::findOrFail($request->department);
            $department->programs()->save($program);
        }

        return redirect()->route('programs.index')->with('status', 'success')->with('message', 'Program has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('programs.index')->with('status', 'success')->with('message', 'Programs has deleted successfully');
    }
}
