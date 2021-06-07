@extends('template.master')

@section('title', 'Top Up')

@section('content')
   

<div class="row" style="padding-top: 25px;"> 
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        @if (session('voucher-sukses'))
            <div class="alert alert-success" role="alert">
                Selamat! Topup Anda Berhasil, Saldo Akan Ditambahkan Ke Akun Anda.
            </div>
        @endif
        @if (session('voucher-404'))
            <div class="alert alert-danger" role="alert">
                Maaf, Kode Voucher Tidak Valid. Silahkan Coba Lagi.
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Top Up</h5>
                <form action="{{route('topupRedeem')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="voucherCode">Voucher Code</label>
                        <input type="text" class="form-control" id="voucherCode" name="voucherCode" placeholder="Voucher Code" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Redeem</button>
                        
                    </div>
                    <small>Untuk Pembelian Voucher Silahkan Hubungi Admin</small>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop