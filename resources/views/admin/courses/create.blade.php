<h4>Create Course</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('courses.store') }}" method="POST" autocomplete="off">
    @csrf
    <p>
        <label>Course Code</label>
        <input type="text" name="code">
    </p>
    <p>
        <label>Title</label>
        <input type="text" name="title">
    </p>
    <p>
        <label>Credit</label>
        <input type="text" name="credit">
    </p>
    <button type="submit">Create</button>
</form>
