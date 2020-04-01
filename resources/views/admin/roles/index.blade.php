@if(Session::has('status'))
    {{ Session::get('message') }}
@endif

<a href="{{ route('roles.create') }}">Create</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>
                <a href="{{ route('roles.edit', $role) }}">Edit</a> |
                <a href="#" onclick="event.preventDefault();document.getElementById('deleteForm').submit();">Delete</a>
                <form id="deleteForm" action="{{ route('roles.destroy', $role) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="2">No Roles</td>
            </tr>
        @endforelse
    </tbody>
</table>
