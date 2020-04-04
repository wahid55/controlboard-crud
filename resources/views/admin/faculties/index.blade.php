@extends('admin.index')
@section('content')


    @if(Session::has('status'))
    {{ Session::get('message') }}
@endif

<p><a href="{{ route('faculties.create') }}" class="btn btn-primary btn-sm">Create</a></p>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th>Name</th>
        <th>Code</th>
        <th>Department</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($faculties as $faculty)
        <tr>
            <td>{{ $faculty->name }}</td>
            <td>{{ $faculty->code }}</td>
            <td>-</td>
            <td>
                <a href="{{ route('faculties.show', $faculty) }}">Show</a> |
                <a href="{{ route('faculties.edit', $faculty) }}">Edit</a> |
                <a href="{{ route('faculties.destroy', $faculty) }}" class="delete">Delete</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No Faculties</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
