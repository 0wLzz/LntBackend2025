<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html, body {
            height: 100%;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content{
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <nav class="navbar bg-body-tertiary bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand">Belajar Laravel</a>
                @if (auth()->check())
                    <div class="d-flex m-3 p-3">
                        <a href="" class="btn btn-dark mx-3">About</a>
                        <a href="{{ route('logout')}}" class="btn btn-danger">Logout</a>
                    </div>
                @else
                    <div class="d-flex m-3 p-3">
                        <a href="{{ route('login_page') }}" class="btn btn-dark mx-3">Login</a>
                        <a href="{{route('register_page')}}" class="btn btn-dark">Register</a>
                    </div>
                @endif
            </div>
          </nav>

        <div class="content container mt-5">

            {{ $slot }}

        </div>


        <footer class="bg-dark text-white text-center py-3">
            <p>Belajar Laravel | Owen Limantoro</p>
        </footer>
    </div>
</body>
</html>