<h4>Create Department</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('departments.store') }}" method="POST" autocomplete="off">
    @csrf
    <p>
        <label>Department Name</label>
        <input type="text" name="name">
    </p>
    <p>
        <label>Established At</label>
        <input type="date" name="established_at">
    </p>
    <button type="submit">Create</button>
</form>
