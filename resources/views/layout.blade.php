<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ asset('scripts.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bookshow.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="custom-background">
  {{-- navbar start --}}

  <nav class="navbar navbar-expand-lg  navbar-dark shadow-5-strong center-navbar">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="{{route('book.index')}}">Navbar</a> --}}
        <a class="nav-link" href="{{route('book.index')}}"><button type="submit" class="buttonnavbar">BookHaven <i class="bi bi-book"></i></button></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="{{route('book.index')}}"><button type="submit" class="grow_box buttonz">Home <i class="bi bi-house"></i></button></a>
                <form class="d-flex" role="search" action="{{ route('book.search') }}" method="GET">
                    <input class="form-control me-2 custom-search-box" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search <i class="bi bi-search"></i></button>
                </form>
                @guest
                    <a class="nav-link" href="{{route('login')}}"><button type="submit" class="grow_box buttonz">Login <i class="bi bi-box-arrow-in-right"></i></button></a>
                    <a class="nav-link" href="{{route('register')}}"><button type="submit" class="grow_box buttonz">Register <i class="bi bi-person-plus"></i></button></a>
                @else
                    {{-- <span class="nav-link">{{ Auth::user()->name }}</span> --}}
                   

                    <form action="{{route('book.mybook')}}" method="get">
                        @csrf
                        {{-- <input type="submit" value="My Books"> --}}
                        <a class="nav-link"> <button type="submit" class="grow_box buttonz">My Books <i class="bi bi-journals"></i></button></a>
                       
                    </form>
                    
                    <form action="{{route('book.cart',['user_id' => auth()->user()->id])}}" method="get">
                        @csrf
                        <a class="nav-link"> <button type="submit" class="grow_box buttonz">Cart <i class="bi bi-cart"></i></button></a>
                        
                    </form> 
                   
                   
                    <a class="nav-link"><button type="submit" class="grow_box buttonz">{{ Auth::user()->name }} <i class="bi bi-person"></i></button></a>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <a class="nav-link"> <button type="submit" class="grow_box buttonz">Logout <i class="bi bi-box-arrow-left"></i></button></a>
                        {{-- <input type="submit" value="Logout"> --}}
                    </form>
                @endguest
                    
                  </div>
                <br>
            </div>
        </div>
    </div>
</nav>

      {{-- navbar end --}}
      
      {{-- background --}}
      <body>
        <div>
           <div class="wave"></div>
           <div class="wave"></div>
           <div class="wave"></div>
        </div>
      </body>
{{-- background end --}}

<div class="content">
    <div id="loader" class="loader"></div>
    <div id="page-content" class="page-content">
        @yield('content')
    </div>
</div>
</body>
</html>