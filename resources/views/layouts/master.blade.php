<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Managment</title>
    <link rel="stylesheet" href="{{ asset('assets/book_list.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary ">
        <a class="navbar-brand" href="{{ route('books.index') }}">Book List</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.create') }}">Add New Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('membership.index') }}">Members portal</a>
                </li>
            </ul>
        </div>
    
    </nav>
    @yield('content')

</body>
</html>