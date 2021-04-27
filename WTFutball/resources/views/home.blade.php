@extends('template.master')

@section('title', 'Home')

@section('content')
<div class="row" style="padding-top: 50px">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <center><h5 class="card-title">Nama Tim</h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#findMatch">Find Match</button></center>


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
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tim Lawan</th>
                                <th>Skor</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>RANS FC</td>
                                <td>3 - 0</td>
                                <td>24 Apr 2021</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    
    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
