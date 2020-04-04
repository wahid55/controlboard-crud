@extends('admin.index')
@section('content')


    <h4>Update Student</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('students.update', $student) }}" method="POST" autocomplete="off">
    @csrf
    @method('PATCH')
    <p>
        <label>ID</label>
        <input class="form-control" type="text" value="{{ $student->id }}" disabled>
    </p>
    <p>
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="{{ $student->name }}">
    </p>
    <p>
        <label>Program</label>
        <select name="program" class="form-control">
            @foreach($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
        </select>
    </p>
    <button type="submit" class="btn btn-primary btn-sm">Update</button>
</form>

    @endsection
