@extends('layouts.master')
@section('content')
    <div class="container">
        <h2>Create a New Book Issue</h2>

        <form action="{{ route('bookissues.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="book_id">Book:</label>
                <select name="book_id" id="book_id" class="form-control">
                    @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="patron_name">Patron Name:</label>
                <input type="text" name="patron_name" value="{{ old('patron_name') }}" />
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Book Issue</button>
            </div>
        </form>
    </div>
    @endsection
