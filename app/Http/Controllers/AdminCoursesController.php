<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('code', 'ASC')->get();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::orderBy('name', 'ASC')->get();
        return view('admin.courses.create', compact('departments'));
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
            'code'      => 'required|string|max:15|unique:courses',
            'title'     => 'required|string|max:255',
            'credit'    => 'required|numeric|between:0,4.00',
            'departments' => 'required',
        ]);

        $course = new Course();
        $course->code = $request->code;
        $course->title = $request->title;
        $course->credit = $request->credit;
        $course->save();
        $course->departments()->sync($request->departments);

        return redirect()->route('courses.index')->with('status', 'success')->with('message', 'Course has created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return false;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $departments = Department::orderBy('name', 'ASC')->get();
        return view('admin.courses.edit', compact('course', 'departments'));
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
        $course = Course::findOrFail($id);

        $this->validate($request, [
            'code'      => [
                'nullable',
                'string',
                'max:15',
                Rule::unique('courses')->ignore($course->id)
            ],
            'title'     => 'nullable|string|max:255',
            'credit'    => 'nullable|numeric|between:0,4.00',
            'departments' => 'required'
        ]);

        $course->code   = $request->code;
        $course->title  = $request->title;
        $course->credit = $request->credit;

        if(in_array('0', $request->departments)) {
            $course->departments()->detach();
        } else {
            $course->departments()->sync($request->departments);
        }

        $course->update();

        return redirect()->route('courses.index')->with('status', 'success')->with('message', 'Course has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('status', 'success')->with('message', 'Course has deleted successfully');
    }
}
