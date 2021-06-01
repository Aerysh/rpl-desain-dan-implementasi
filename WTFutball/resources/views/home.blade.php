@extends('template.master')

@section('title', 'Home')

@section('content')
@if (session('noHistory'))
    cek
@endif
<div class="row" style="padding-top: 50px">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <center><h5 class="card-title">@foreach ($namaTim as $nt)
                    {{$nt->nama}}
                @endforeach</h5>
                <h6>Team Rating</h6>
                <h6>{{$ratingSaya}}</h6>
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
                            <th hidden>#</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarPemain as $dp)
                            <tr>
                                <td hidden>{{$dp->id}}</td>
                                <td>{{$dp->nama}}</td>
                                <td>{{$dp->posisi}}</td>
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
                                <th>Tim Lawan</th>
                                <th>Skor</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('hasHistory'))
                                <tr>
                                    <td>
                                        @foreach ($historyLawan as $hl)
                                            {{$hl->nama}}
                                        @endforeach
                                    </td>
                                    @foreach ($historySkor as $hs)
                                        <td>
                                            {{$hs->skorHome}} - {{$hs->skorAway}}
                                        </td>
                                        <td>
                                            {{date('d-M-y', strtotime($hs->created_at))}}
                                        </td>
                                    @endforeach
                                </tr>
                            @else
                                <tr>
                                    <td colspan="3" style="text-align: center">Data Tidak Ditemukan</td>
                                </tr>
                            @endif
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

