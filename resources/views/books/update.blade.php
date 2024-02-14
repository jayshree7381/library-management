
@extends('layouts.master')

@section('content')
    <h2>Update Book</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" required>
        <br>
        <label for="author">Author:</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}" required>
        <br>
        <br>
        <label for="price">Price:</label>
        <input type="number" name="price" value="{{ old('price', $book->price) }}" required>
        <br>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('books.index') }}">Back to Book List</a>
@endsection
