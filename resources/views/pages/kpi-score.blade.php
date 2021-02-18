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
                                    <th>ID CSO</th>
                                    <th>Nama CSO</th>
                                    <th>Micro Cluster</th>
                                    <th>Not Order</th>
                                    <th>MSA</th>
                                    <th>OMB</th>
                                    <th>QSSO</th>
                                    <th>QURO</th>
                                    <th>Serious Customer</th>
                                    <th>SSO HVC</th>
                                    <th>Serious QSSO</th>
                                    <th>Site Serious Customer</th>
                                    <th>Total</th>
                                    <th>Action</th>
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
        scrollX     : true,
        ajax: "{{ route('kpi-data.index') }}",
        columns: [
            {data: 'username', name: 'username'},
            {data: 'nama', name: 'nama'},
            {data: 'micro_cluster', name: 'micro_cluster'},
            {data: 'not_order', name: 'not_order'},
            {data: 'msa_nilai', name: 'msa_nilai'},
            {data: 'omb_nilai', name: 'omb_nilai'},
            {data: 'qsso_nilai', name: 'qsso_nilai'},
            {data: 'quro_nilai', name: 'quro_nilai'},
            {data: 'sc_nilai', name: 'sc_nilai'},
            {data: 'ssohvc_nilai', name: 'ssohvc_nilai'},
            {data: 'sqsso_nilai', name: 'sqsso_nilai'},
            {data: 'ssc_nilai', name: 'ssc_nilai'},
            {data: 'score', name: 'score'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [ 0 , 'desc'],
    });
    
  });
</script>
@endpush