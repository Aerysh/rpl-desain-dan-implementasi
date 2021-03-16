@extends('template.master')

@section('title', 'Buat Tim')

@section('content')
<div class="row" style="padding-top: 50px">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Akun Berhasil Dibuat!, Silahkan Masukan Nama Tim</center>
        </div>
        <div class="card text-white bg-secondary mb-3">
            <div class="card-header">Buat Tim</div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="namaTim">Nama Tim</label>
                        <input type="text" class="form-control" id="namaTim" name="namaTim" placeholder="Nama Tim" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Buat Tim</button>
                    </div>
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
