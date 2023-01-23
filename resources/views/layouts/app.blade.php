<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laravel App - @yield('title')</title>
</head>
<body>
    <div class="container p-3 bg-white border-bottom shadow-sm mb-3">
        <div class="row">
            <div class="col-lg-2 text-center">
                <h5 class="my-0 mr-md-auto font-weight-normal">Personal blog</h5>
            </div>
            <div class="col-lg-5 p-0 mb-0"></div>
            <div class="col-lg-5 text-center">
                <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark text-decoration-none" href="{{ route('home.index') }}">Home</a>
                    <a class="p-2 text-dark text-decoration-none" href="{{ route('home.contact') }}">Contact</a>
                    <a class="p-2 text-dark text-decoration-none" href="{{ route('posts.index') }}">Blog Posts</a>
                    <a class="p-2 text-dark text-decoration-none" href="{{ route('posts.create') }}">Add Blog Post</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">


    </div> --}}
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </div>
    {{-- <div class="container-fluid p-3 bg-dark text-white">
        <p>This is a footer</p>
    </div> --}}
</body>
</html>
