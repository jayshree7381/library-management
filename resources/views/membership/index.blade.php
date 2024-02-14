@extends('layouts.master')

@section('content')
<h2>Membership List</h2>
<a href="{{ route('membership.create') }}">Add Member</a>


@if(count($memberships) > 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($memberships as $membership)
        <tr>
            <td>{{ $membership->id }}</td>
            <td>{{ $membership->name }}</td>
            <td>{{ $membership->email }}</td>
            <td>
                <a href="{{ route('membership.edit', $membership->id) }}" class="btn btn-primary">Edit</a>
            </td>
         <td>   <form action="{{ route('membership.destroy', $membership->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
         </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No memberships found.</p>
@endif

@endsection