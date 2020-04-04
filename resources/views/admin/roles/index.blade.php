@extends('admin.index')
@section('content')

<p><a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">Create</a></p>

<table class="table-sm table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Users</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>{{ count($role->users) }}</td>
            <td>
                <a href="{{ route('roles.edit', $role) }}">Edit</a> |
                <a href="{{ route('roles.destroy', $role) }}" class="delete">Delete</a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3">No Roles</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
