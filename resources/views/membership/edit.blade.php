@extends('layouts.master')
@section('content')
    <h2>Edit Member</h2>

    <form action="{{ route('membership.update', $membership->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $membership->name }}" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $membership->email }}" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" value="{{ $membership->password }}" required>
        <br>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('membership.index') }}">Back to member List</a>
@endsection