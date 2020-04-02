@if(Session::has('status'))
    {{ Session::get('message') }}
@endif

<a href="{{ route('departments.create') }}">Create</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Established</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($departments as $department )
        <tr>
            <td>{{ $department->name }}</td>
            <td>{{ $department->established_at }}</td>
            <td>
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
