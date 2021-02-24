@extends('layouts.master-admin')
@section('content')
<?php $upload = 'Belum Ada Data' ?>
@foreach($data_upload as $data)
<?php
    $upload = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->waktu_upload)->format('H:i:s | d/m/Y');
?>
@endforeach
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Indosat</a></li>
                <li class="breadcrumb-item"><a href="">Outlet</a></li>
                <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transaksi Outlet <span style="float: right;"><i>Last Update : {{$upload}}</i></span></h5>
                        <table class="table table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="2">Outlet ID</th>
                                    <th rowspan="2">Outlet Name</th>
                                    <th rowspan="2">Transaksi MOBO</th>
                                    <th colspan="3">Effective call</th>
                                    <th colspan="3">Sultan</th>
                                    <th colspan="3">Jawara</th>
                                </tr>
                                <tr>
                                    <th>Sellin 90D</th>
                                    <th>Daily Sellin</th>
                                    <th>Daily Mobo</th>
                                    <th>Target</th>
                                    <th>Ach</th>
                                    <th>Percen</th>
                                    <th>Target</th>
                                    <th>Ach</th>
                                    <th>Percen</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        initComplete: function (settings, json) {  
            $(".data-table").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
        processing  : true,
        serverSide  : true,
        
        ajax: "{{ route('outlet-data.outletTransaction') }}",
        columns: [
            {data: 'outlet_id', name: 'outlet_id'},
            {data: 'outlet_name', name: 'outlet_name'},
            {data: 'mobo_transaction', name: 'mobo_transaction'},
            {data: 'sellin_sp', name: 'sellin_sp'},
            {data: 'sellin_daily', name: 'sellin_daily'},
            {data: 'mobo_daily', name: 'mobo_daily'},
            {data: 'sultan_target', name: 'sultan_target'},
            {data: 'sultan_ach', name: 'sultan_ach'},
            {data: 'sultan_percen', name: 'sultan_percen'},
            {data: 'jawara_target', name: 'jawara_target'},
            {data: 'jawara_ach', name: 'jawara_ach'},
            {data: 'jawara_percen', name: 'jawara_percen'},
        ],
        order: [ 0 , 'desc'],
    });
    
  });
</script>
@endpush