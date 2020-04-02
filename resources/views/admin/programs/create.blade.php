<h4>Create Program</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('programs.store') }}" method="POST" autocomplete="off">
    @csrf
    <p>
        <label>Program Name</label>
        <input type="text" name="name">
    </p>
    <p>
        <label>Department</label>
        <select name="department">
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
                <option value="0">None</option>
        </select>
    </p>
    <button type="submit">Create</button>
</form>
