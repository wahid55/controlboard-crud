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
    <label>Name</label>
    <input type="text" name="name">
    <button type="submit">Create</button>
</form>
