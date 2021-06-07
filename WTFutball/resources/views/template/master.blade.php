<!DOCTYPE html>
<html>
    <head>
        {{-- Meta Tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title') - WTFutball</title>
        {{-- CSS --}}
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        @yield('css')
    </head>
    <body>
        <header>
          <div class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
              <a class="navbar-brand" href="/home">WTFutball</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/home')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#transaksi">Transaksi Pemain</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/formasi')}}">Atur Formasi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/topup')}}">Top-Up</a>
                  </li>
                </ul>

                <ul class="navbar-nav my-2 my-lg-0">
                  <li class="nav-item">
                    <a class="nav-link">Saldo : {{Auth::user()->saldo}}</a>
                  </li>
                  <li class="nav-item">
                    <form action="{{route('logout')}}" method="POST">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </header>

        <main role="main" style="padding-bottom: 25px;">
            <div class="container">
                @yield('content')

                {{-- Modal Transaksi --}}
                <div class="modal fade" id="transaksi" tabindex="-1" role="dialog" aria-labelledby="transaksi" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="transaksi">Transaksi Pemain</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <center>
                              <a href="{{route('indexBeliPemain')}}" class="btn btn-primary">Beli Pemain</a> 
                              <a href="{{route('indexJualPemain')}}" class="btn btn-primary">Jual Pemain</a>
                            </center>
                          </div>
                      </div>
                  </div>
              </div>
              {{-- Modal Transaksi --}}
            </div>
        </main>

        {{-- JS --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        @yield('js')
    </body>
</html>