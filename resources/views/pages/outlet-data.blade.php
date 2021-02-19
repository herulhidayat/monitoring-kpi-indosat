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
                                    <th>Outlet ID</th>
                                    <th>Outlet Name</th>
                                    <th>Micro Cluster</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!-- Modal Edit -->
                        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalCenterTitle">Edit Data Outlet</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Outlet ID</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Outlet Name</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Micro Cluster</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">PJP</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Saldo</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Transaksi Mobo</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                            </div>
                                            <div class="form-group">
                                                <h5 class="card-title text-center">Sultan</h5>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="formGroupExampleInput">Sultan Target</label>
                                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="formGroupExampleInput">Sultan Achievement</label>
                                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="formGroupExampleInput">Sultan Percen</label>
                                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5 class="card-title text-center">Jawara</h5>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="formGroupExampleInput">Jawara Target</label>
                                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="formGroupExampleInput">Jawara Achievement</label>
                                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="formGroupExampleInput">Jawara Percen</label>
                                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        
        ajax: "{{ route('outlet-data.index') }}",
        columns: [
            {data: 'outlet_id', name: 'outlet_id'},
            {data: 'outlet_name', name: 'outlet_name'},
            {data: 'micro_cluster', name: 'micro_cluster'},
            {data: 'category', name: 'category'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [ 0 , 'desc'],
    });
    
  });
</script>
@endpush