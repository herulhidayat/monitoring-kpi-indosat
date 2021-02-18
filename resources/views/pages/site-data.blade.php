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
                                    <th>Site ID</th>
                                    <th>Site Name</th>
                                    <th>Micro Cluster</th>
                                    <th>Site Coverage</th>
                                    <th>Status</th>
                                    <th>Outlet Surrounding</th>
                                    <th>ONO</th>
                                    <th>Total Outlet</th>
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
        processing: true,
        serverSide: true,
        ajax: "{{ route('site-data.index') }}",
        columns: [
            {data: 'site_id', name: 'site_id'},
            {data: 'site_name', name: 'site_name'},
            {data: 'micro_cluster', name: 'micro_cluster'},
            {data: 'coverage', name: 'coverage'},
            {data: 'status', name: 'status'},
            {data: 'outlet_surrounding', name: 'outlet_surrounding'},
            {data: 'ono', name: 'ono'},
            {data: 'total_outlet', name: 'total_outlet'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [ 0 , 'desc'],
    });
    
  });
</script>
@endpush