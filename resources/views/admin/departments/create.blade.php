@extends('admin.index')
@section('content')

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
        <input class="form-control" type="text" name="name">
    </p>
    <p>
        <label>Established At</label>
        <input class="form-control" type="date" name="established_at">
    </p>
    <button type="submit" class="btn btn-primary btn-sm">Create</button>
</form>
@endsection
