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
                <li class="breadcrumb-item"><a href="">Site</a></li>
                <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transaksi Site <span style="float: right;"><i>Last Update : {{$upload}}</i></span></h5>
                        <table class="table table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Site ID</th>
                                    <th>Site Name</th>
                                    <th>URO</th>
                                    <th>SSO</th>
                                    <th>QURO</th>
                                    <th>QSSO</th>
                                    <th>Revenue</th>
                                    <th>GAP Revenue</th>
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
        ajax: "{{ route('site-data.siteTransaction') }}",
        columns: [
            {data: 'site_id', name: 'site_id'},
            {data: 'site_name', name: 'site_name'},
            {data: 'uro', name: 'uro'},
            {data: 'sso', name: 'sso'},
            {data: 'quro', name: 'quro'},
            {data: 'qsso', name: 'qsso'},
            {data: 'revenue', name: 'revenue'},
            {data: 'gap_revenue', name: 'gap_revenue'},
        ],
        order: [ 0 , 'desc'],
    });
    
  });
</script>
@endpush