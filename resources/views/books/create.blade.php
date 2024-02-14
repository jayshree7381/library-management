
@extends('layouts.master')

@section('content')
<div class="container create-container">
    <h4>Create Book</h4>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <br>
        <label for="author">Author:</label>
        <input type="text" name="author" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" name="price" required>
        <br>
        <button type="submit">Save</button>
    </form>

    <a href="{{ route('books.index') }}">Back to Book List</a>
    </div>
@endsection
