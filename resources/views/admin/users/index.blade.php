@extends('admin.index')
@section('content')


    @if(Session::has('status'))
    {{ Session::get('message') }}
@endif

<p><a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Create</a></p>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>Name</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>
                @foreach($user->roles as $role)
                    {{ $role->name }}
                @endforeach
            </td>
            <td>
                <a href="{{ route('users.show', $user) }}">Show</a> |
                <a href="{{ route('users.edit', $user) }}">Edit</a> |
                <a href="{{ route('users.destroy', $user) }}" class="delete">Delete</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="2">No User</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
