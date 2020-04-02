@if(Session::has('status'))
    {{ Session::get('message') }}
@endif

<a href="{{ route('programs.create') }}">Create</a>

<table>
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
            <td>-</td>
            <td>
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
