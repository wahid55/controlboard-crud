@extends('admin.index')
@section('content')


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
        <input class="form-control" type="text" name="code">
    </p>
    <p>
        <label>Title</label>
        <input class="form-control" type="text" name="title">
    </p>
    <p>
        <label>Credit</label>
        <input class="form-control" type="text" name="credit">
    </p>
    <p>
        <label>Programs</label>
        <select name="programs[]" class="form-control" multiple>
            @foreach($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
            <option value="0">None</option>
        </select>
    </p>
    <button type="submit" class="btn btn-sm btn-primary">Create</button>
</form>
@endsection
