@extends('template.master')

@section('title', 'Jual Pemain')

@section('content')
<div class="row"  style="padding-top: 25px;">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        @if (session('jualSuccess'))
            <div class="alert alert-success" role="alert">
                <center>Transaksi Jual Pemain Berhasil !</center>
            </div>
        @endif
    </div>
    <div class="col-md-3">
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        {{-- Kolom Kiri --}}
    </div>

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
                            <th></th>
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
                                <td><a class="btn btn-primary" href="{{route('jualPemain', ['id' => $dp->id])}}">Jual</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        {{-- Kolom Kanan --}}
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