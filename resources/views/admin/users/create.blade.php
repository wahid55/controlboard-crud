@extends('admin.index')
@section('content')
<h4>Create User</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.store') }}" method="POST" autocomplete="off">
    @csrf
    <p>
        <label>Name</label>
        <input class="form-control" type="text" name="name">
    </p>
    <p>
        <label>Email</label>
        <input class="form-control" type="text" name="email">
    </p>
    <p>
        <label>Password</label>
        <input class="form-control" type="password" name="password">
    </p>
    <p>
        <label>Confirm Password</label>
        <input class="form-control" type="password" name="password_confirmation">
    </p>
    <p>
        <label>Roles</label>
        <select name="roles[]" class="form-control" multiple>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
            <option value="0">None</option>
        </select>
    </p>
    <button type="submit" class="btn btn-primary btn-sm">Create</button>
</form>

@endsection
