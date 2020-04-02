<h4>Edit Department</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('departments.update', $department) }}" method="POST" autocomplete="off">
    @csrf
    @method('PATCH')

    <p>
        <label>Department Name</label>
        <input type="text" name="name" value="{{ $department->name }}">
    </p>
    <p>
        <label>Established At</label>
        <input type="date" name="established_at" value="{{ $department->established_at }}">
    </p>
    <button type="submit">Update</button>
</form>
