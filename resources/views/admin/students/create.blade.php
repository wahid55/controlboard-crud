@extends('admin.index')
@section('content')
<h4>Create Student</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('students.store') }}" method="POST" autocomplete="off">
    @csrf
    <p>
        <label>ID</label>
        <input class="form-control" type="text" value="{{ $id }}" disabled>
    </p>
    <p>
        <label>Name</label>
        <input class="form-control" type="text" name="name">
    </p>
    <p>
        <label>Program</label>
        <select name="program" class="form-control">
            @foreach($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
        </select>
    </p>
    <button type="submit" class="btn btn-primary btn-sm">Create</button>
</form>

@endsection
