<h4>Edit Course</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('courses.update', $course) }}" method="POST" autocomplete="off">
    @csrf
    @method('PATCH')

    <p>
        <label>Course Code</label>
        <input type="text" name="code" value="{{ $course->code }}">
    </p>
    <p>
        <label>Title</label>
        <input type="text" name="title" value="{{ $course->title }}">
    </p>
    <p>
        <label>Credit</label>
        <input type="text" name="credit" value="{{ $course->credit }}">
    </p>
    <p>
        <label>Departments</label>
        <select name="departments[]" multiple>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
            <option value="0">None</option>
        </select>
    </p>
    <button type="submit">Update</button>
</form>
