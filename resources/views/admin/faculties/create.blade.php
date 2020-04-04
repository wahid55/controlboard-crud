@extends('admin.index')
@section('content')
<h4>Create Faculty</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('faculties.store') }}" method="POST" autocomplete="off">
    @csrf
    <p>
        <label>Name</label>
        <input class="form-control" type="text" name="name">
    </p>
    <p>
        <label>Code</label>
        <input class="form-control" type="text" name="code">
    </p>
    <p>
        <label>Department</label>
        <select name="department" class="form-control">
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </p>
    <button type="submit" class="btn btn-primary btn-sm">Create</button>
</form>

@endsection
