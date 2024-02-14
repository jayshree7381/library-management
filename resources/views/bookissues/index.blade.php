@extends('layouts.master')
@section('content')
<div class="container mt-4">
   <div>
         <h2 class="title">Issued Books</h2>
        <a href="{{ route('bookissues.create') }}">Book Issue</a>
   </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Buttons</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookissues as $bookissue)
            <tr>
                <td>{{ $bookissue->id }}</td>
                <td>{{ $bookissue->book->title }}</td>
                <td>{{ $bookissue->book->author }}</td>
                <td>{{ $bookissue->book->price }}</td>
                <td>
                    <a href="{{ route('bookissues.return', $bookissue->id) }}" class="btn btn-success">Return</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection