@extends('template.master')

@section('title', 'Transaksi Pemain')

@section('content')
<div class="row" style="padding-top: 25px;">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pemain</h5>
                <table class="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th hidden>#</th>
                            <th>Nama</th>
                            <th>Posisi</th>
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
                                <td>{{$dp->harga}}</td>
                                <td><a href="#" class="btn btn-primary">Beli</a>
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

@stop

@section('js')

@stop