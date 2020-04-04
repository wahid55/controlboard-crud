@extends('admin.index')
@section('content')

<p><a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">Create</a></p>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Program</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->program->name }}</td>
            <td>
                <a href="{{ route('students.show', $student) }}">Show</a> |
                <a href="{{ route('students.edit', $student) }}">Edit</a> |
                <a href="{{ route('students.destroy', $student) }}" class="delete">Delete</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No Students</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
