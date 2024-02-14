
@extends('layouts.master')

@section('content')
    <h2>Membership Form</h2>

    <form action="{{ route('membership.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Save</button>
    </form>
@endsection
