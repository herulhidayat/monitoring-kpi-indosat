@extends('layouts.master-admin')
@section('content')
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Extended</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Site</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Site</h5>
                        <table class="table table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="2">ID CSO</th>
                                    <th rowspan="2">Nama CSO</th>
                                    <th rowspan="2">Micro Cluster</th>
                                    <th colspan="5">Serious Customer</th>
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
        processing  : true,
        serverSide  : true,
        ajax: "{{ route('kpi-data.sc') }}",
        columns: [
            {data: 'username', name: 'username'},
            {data: 'nama', name: 'nama'},
            {data: 'micro_cluster', name: 'micro_cluster'},
            {data: 'sc_target', name: 'sc_target'},
            {data: 'sc_ach', name: 'sc_ach'},
            {data: 'sc_gap', name: 'sc_gap'},
            {data: 'sc_percen', name: 'sc_percen'},
            {data: 'sc_nilai', name: 'sc_nilai'},
        ],
        order: [ 0 , 'desc'],
    });
    
  });
</script>
@endpush