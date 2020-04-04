@extends('admin.index')
@section('content')

<h4>Edit Role</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('roles.update', $role) }}" method="POST" autocomplete="off">
    @csrf
    @method('PATCH')

    <p>
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="{{ $role->name }}">
    </p>
    <button type="submit" class="btn btn-primary btn-sm">Update</button>
</form>
@endsection
