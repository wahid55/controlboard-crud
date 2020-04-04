@extends('admin.index')
@section('content')


    <h4>Update Faculty</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('faculties.update', $faculty) }}" method="POST" autocomplete="off">
    @csrf
    @method('PATCH')
    <p>
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="{{ $faculty->name }}">
    </p>
    <p>
        <label>Faculty Code</label>
        <input class="form-control" type="text" name="code" value="{{ $faculty->code }}">
    </p>
    <p>
        <label>Department</label>
        <select name="department" class="form-control">
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </p>
    <button type="submit" class="btn btn-primary btn-sm">Update</button>
</form>

    @endsection
