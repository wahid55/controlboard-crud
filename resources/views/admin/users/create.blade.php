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
        <input type="text" name="name">
    </p>
    <p>
        <label>Email</label>
        <input type="text" name="email">
    </p>
    <p>
        <label>Password</label>
        <input type="password" name="password">
    </p>
    <p>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation">
    </p>
    <p>
        <label>Roles</label>
        <select name="roles[]" multiple>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
            <option value="0">None</option>
        </select>
    </p>
    <button type="submit">Create</button>
</form>
