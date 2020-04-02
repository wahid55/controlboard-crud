<h4>Update User</h4>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.update', $user) }}" method="POST" autocomplete="off">
    @csrf
    @method('PATCH')
    <p>
        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}">
    </p>
    <p>
        <label>Email</label>
        <input type="text" name="email" value="{{ $user->email }}">
    </p>
    <p>
        <label>Password</label>
        <input type="password" name="password">
    </p>
    <p>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation">
    </p>
    <button type="submit">Update</button>
</form>
