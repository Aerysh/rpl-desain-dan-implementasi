@extends('template.master')

@section('title', 'Home')

@section('content')
@if (session('noHistory'))
    cek
@endif
<div class="row" style="padding-top: 25px">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <center>
                <h5 class="card-title">
                    @foreach ($namaTim as $nt)
                        {{$nt->nama}}
                    @endforeach <span class="badge bg-success">{{$ratingSaya}}</span>
                </h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#findMatch">Find Match</button></center>
            </div>
        </div>
        <br />
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pemain Saya</h5>
                <table class="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarPemain as $dp)
                            <tr>
                                <td>{{$dp->nama}}</td>
                                <td>{{$dp->posisi}}</td>
                                <td>{{$dp->rating}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Modal --}}
        <div class="modal fade" id="findMatch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Find Match</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <center>Finding Match...</center>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal --}}
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">History Pertandingan</h5>
                <div class="table-responsive">
                    <table class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Skor</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" style="text-align: center">Data Tidak Ditemukan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop

