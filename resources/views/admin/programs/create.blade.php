@extends('admin.index')
@section('content')
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
        <input class="form-control" type="text" name="name">
    </p>
    <p>
        <label>Department</label>
        <select name="department" class="form-control">
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
                <option value="0">None</option>
        </select>
    </p>
    <button type="submit" class="btn btn-primary btn-sm">Create</button>
</form>
@endsection
