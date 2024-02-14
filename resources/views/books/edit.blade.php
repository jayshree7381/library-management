@extends('layouts.master')
@section('content')
    <h2>Edit Book</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $book->title }}" required>
        <br>
        <label for="author">Author:</label>
        <input type="text" name="author" value="{{ $book->author }}" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" name="price" value="{{ $book->price }}" required>
        <br>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('books.index') }}">Back to Book List</a>
@endsection