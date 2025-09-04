<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sticky Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        html, body {
            height: 100%;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container fs-5">
                <a class="navbar-brand" href="{{ route('posts.index') }}">Belajar Laravel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if (Auth::check())
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="">About</a></li>
                            <li class="nav-item"><a class="nav-link text-danger" href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    @else    
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="{{route('login_page')}}">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('register_page')}}">Register</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </nav>

        {{ $slot }}

        <!-- Footer -->
        <footer class="bg-dark text-white text-center py-3">
            <p>&copy; 2024 Belajar Laravel | Email: <a href="mailto:owen.limantoro@binus.ac.id" class="text-white">owen.limantoro@binus.ac.id</a></p>
            <p>
                <a href="https://github.com/0wLzz" target="_blank" class="text-white me-3">GitHub</a>
                <a href="https://instagram.com/yourinstagram" target="_blank" class="text-white">Instagram</a>
            </p>
        </footer>
    </div>

</body>
</html>