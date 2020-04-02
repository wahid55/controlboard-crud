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
                <a href="{{ route('roles.destroy', $role) }}" class="delete">Delete</a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="2">No Roles</td>
            </tr>
        @endforelse
    </tbody>
</table>


<form id="deleteForm" action="/" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>


<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('.delete').click(function (e) {
        e.preventDefault();
        $('#deleteForm').attr('action', $(this).attr('href')).submit();
    });
</script>
