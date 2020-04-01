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

    <label>Name</label>
    <input type="text" name="name" value="{{ $role->name }}">
    <button type="submit">Update</button>
</form>
