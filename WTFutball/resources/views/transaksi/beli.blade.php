@extends('template.master')

@section('title', 'Beli Pemain')

@section('content')
<div class="row"  style="padding-top: 25px;">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        @if (session('fullTeam'))
            <div class="alert alert-danger" role="alert">
                <center>Jumlah Pemain Didalam Team Sudah Penuh !</center>
            </div>
        @endif

        @if (session('beliSuccess'))
            <div class="alert alert-success" role="alert">
                <center>Transaksi Beli Pemain Berhasil !</center>
            </div>
        @endif

        @if (session('saldoKurang'))
            <div class="alert alert-warning" role="alert">
                <center>Saldo Anda Tidak Mencukupi !</center>
            </div>
        @endif
    </div>
    <div class="col-md-3">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pemain</h5>
                <table class="table table-dark table-striped dt-responsive nowrap" style="width: 100%" id="daftarPemain">
                    <thead>
                        <tr>
                            <th hidden>#</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Rating</th>
                            <th>Harga</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarPemain as $dp)
                            <tr>
                                <td hidden>{{$dp->id}}</td>
                                <td>{{$dp->nama}}</td>
                                <td>{{$dp->posisi}}</td>
                                <td>{{$dp->rating}}</td>
                                <td>{{$dp->harga}}</td>
                                <td><a href="{{route('beliPemain', ['id' => $dp->id])}}" class="btn btn-primary">Beli</a>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Wishlist</h5>
                <form action="" method="">
                    <div class="form-group">
                        <label for="wishlistPemain">Posisi</label>
                        <select class="custom-select" id="wishlistPemain" name="wishlistPemain">
                            <option value="" selected disabled hidden>Pilih Posisi</option>
                            <option value="FWD">FWD</option>
                            <option value="MID">MID</option>
                            <option value="DEF">DEF</option>
                            <option value="GK">GK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/datatables.min.css"/>
@stop

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        var table = $('#daftarPemain').DataTable( {
            pageLength : 5,
            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']]
        })
    });
</script>
@stop