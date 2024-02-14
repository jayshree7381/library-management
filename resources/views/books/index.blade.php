@extends('layouts.master')
@section('content')
<div class="container mt-4">
   <div>
         <h2 class="title">Book List</h2>
        <a href="{{ route('bookissues.create') }}">Book Issue</a>
   </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Checked Out</th>
                <th>Buttons</th>
                <th>Issue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td>
                    @if ($book->checked_out)
                    Issued
                    @else
                    N/A
                    @endif
                </td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                </td>
                <td><form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection