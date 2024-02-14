
@extends('layouts.master')

@section('content')
    <h2>Update Member</h2>

    <form action="{{ route('membership.update', $membership->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $membership->name) }}" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $membership->email) }}" required>
        <br>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" value="{{ old('password', $membership->password) }}" required>
        <br>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('membership.index') }}">Back to Book List</a>
@endsection
