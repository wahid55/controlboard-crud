@extends('admin.index')
@section('content')

@if(Session::has('status'))
    {{ Session::get('message') }}
@endif

<p><a href="{{ route('departments.create') }}" class="btn-primary btn btn-sm">Create</a></p>

<table class="table-bordered table-sm table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Programs</th>
            <th>Established</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($departments as $department )
        <tr>
            <td>{{ $department->name }}</td>
            <td>{{ count($department->programs) }}</td>
            <td>{{ $department->established_at }}</td>
            <td>
                <a href="{{ route('departments.show', $department ) }}">Show</a> |
                <a href="{{ route('departments.edit', $department ) }}">Edit</a> |
                <a href="{{ route('departments.destroy', $department ) }}" class="delete">Delete</a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3">No departments</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
