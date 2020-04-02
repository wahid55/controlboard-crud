@if(Session::has('status'))
    {{ Session::get('message') }}
@endif

<a href="{{ route('courses.create') }}">Create</a>

<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Title</th>
            <th>Credit</th>
        </tr>
    </thead>
    <tbody>
        @forelse($courses as $course)
        <tr>
            <td>{{ $course->code }}</td>
            <td>{{ $course->title }}</td>
            <td>{{ $course->credit }}</td>
            <td>
                <a href="{{ route('courses.edit', $course) }}">Edit</a> |
                <a href="{{ route('courses.destroy', $course) }}" class="delete">Delete</a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3">No Courses</td>
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
