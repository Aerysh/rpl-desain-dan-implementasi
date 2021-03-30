<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Meta Tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>WTFutball</title>

        {{-- CSS --}}
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        @yield('css')
    </head>
    <body>
        {{-- Navbar --}}
        <header>
            <div class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <a class="navbar-brand" href="#">WTFutball</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav mr-auto">
                        </ul>

                        <ul class="navbar-nav d-flex">
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/home')}}">Dashboard</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <main role="main">
            <div class="container">
                <div class="row" style="padding-top: 25px;">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Berita Olahraga</h5>
                                {{-- <div class="row" style="">
                                    <div class="col"> --}}
                                        @foreach ($responseDecode['articles'] as $rd => $r)
                                            @if ($loop->iteration > 5)
                                                @break
                                            @else
                                                <div class="card border-secondary">
                                                    <img class="card-img-top" src={{$r['urlToImage']}} alt="">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{$r['title']}}</h5>
                                                        <p class="card-text">{{$r['description']}}</p>
                                                        <a href="{{$r['url']}}">Read More</a>
                                                    </div>
                                                </div>
                                                <br>
                                            @endif
                                        @endforeach
                                    {{-- </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            
                    </div>
                </div>
            </div>
        </main>

        <footer style="padding-top: 25px;">

        </footer>

    </body>
</html>