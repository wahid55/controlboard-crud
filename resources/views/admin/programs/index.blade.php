@extends('admin.index')
@section('content')

<p><a href="{{ route('programs.create') }}" class="btn btn-sm btn-primary">Create</a></p>

<table class="table-bordered table table-sm">
    <thead>
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($programs as $program)
        <tr>
            <td>{{ $program->name }}</td>
            <td>{{ $program->department->name ?? '' }}</td>
            <td>
                <a href="{{ route('programs.show', $program ) }}">Show</a> |
                <a href="{{ route('programs.edit', $program ) }}">Edit</a> |
                <a href="{{ route('programs.destroy', $program ) }}" class="delete">Delete</a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3">No programs</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
