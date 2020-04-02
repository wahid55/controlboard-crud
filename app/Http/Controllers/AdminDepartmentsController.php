<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminDepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('name', 'ASC')->get();
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
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
            'name'              => 'required|string|max:255|unique:departments',
            'established_at'    => 'nullable|date',
        ]);

        $department = new Department();
        $department->name = $request->name;
        if($request->has('established_at')) {
            $department->established_at = $request->established_at;
        }

        $department->save();

        return redirect()->route('departments.index')->with('status', 'success')->with('message', 'Department has created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return redirect()->route('departments.show')->with(compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments.edit', compact('department'));
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
        $department = Department::findOrFail($id);

        $this->validate($request, [
            'name'              => [
                'required',
                'string',
                'max:255',
                Rule::unique('departments')->ignore($department->id)
            ],
            'established_at'    => 'nullable|date',
        ]);

        $department->name = $request->name;

        if($request->has('established_at')) {
            $department->established_at = $request->established_at;
        }

        $department->update();

        return redirect()->route('departments.index')->with('status', 'success')->with('message', 'Department has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departments = Department::findOrFail($id);
        $departments->delete();
        return redirect()->route('departments.index')->with('status', 'success')->with('message', 'Department has deleted successfully');
    }
}
