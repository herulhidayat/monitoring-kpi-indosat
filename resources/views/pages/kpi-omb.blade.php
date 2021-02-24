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
                <li class="breadcrumb-item"><a href="">KPI</a></li>
                <li class="breadcrumb-item active" aria-current="page">OMB</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Site <span style="float: right;"><i>Last Update : {{$upload}}</i></span></h5>
                        <table class="table table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="2">ID CSO</th>
                                    <th rowspan="2">Nama CSO</th>
                                    <th rowspan="2">Micro Cluster</th>
                                    <th colspan="5">OMB</th>
                                </tr>
                                <tr>
                                    <th>Target</th>
                                    <th>Ach</th>
                                    <th>Gap</th>
                                    <th>Percen</th>
                                    <th>Nilai</th>
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
        ajax: "{{ route('kpi-data.omb') }}",
        columns: [
            {data: 'username', name: 'username'},
            {data: 'nama', name: 'nama'},
            {data: 'micro_cluster', name: 'micro_cluster'},
            {data: 'omb_target', name: 'omb_target'},
            {data: 'omb_ach', name: 'omb_ach'},
            {data: 'omb_gap', name: 'omb_gap'},
            {data: 'omb_percen', name: 'omb_percen'},
            {data: 'omb_nilai', name: 'omb_nilai'},
        ],
        order: [ 0 , 'desc'],
    });
    
  });
</script>
@endpush