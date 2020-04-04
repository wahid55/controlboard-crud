@extends('admin.index')
@section('content')

<p><a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">Create</a></p>

<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>Code</th>
            <th>Title</th>
            <th>Credit</th>
            <th>Programs</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($courses as $course)
        <tr>
            <td>{{ $course->code }}</td>
            <td>{{ $course->title }}</td>
            <td>{{ $course->credit }}</td>
            <td>{{ count($course->programs) }}</td>
            <td>
                <a href="{{ route('courses.edit', $course) }}">Edit</a> |
                <a href="{{ route('courses.destroy', $course) }}" class="delete">Delete</a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="4">No Courses</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
