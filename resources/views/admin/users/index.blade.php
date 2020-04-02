@if(Session::has('status'))
    {{ Session::get('message') }}
@endif

<a href="{{ route('users.create') }}">Create</a>

<table>
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
            <td>-</td>
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
