@extends('admin.index')
@section('content')

<h4>Create Role</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('roles.store') }}" method="POST" autocomplete="off">
    @csrf
    <p>
        <label>Name</label>
        <input class="form-control" type="text" name="name">
    </p>
    <button type="submit" class="btn btn-primary btn-sm">Create</button>
</form>

    @endsection
