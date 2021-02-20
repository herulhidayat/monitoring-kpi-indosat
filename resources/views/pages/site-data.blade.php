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
                            <meta name="csrf-token-delete" content="{{ csrf_token() }}">
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
<!-- Modal Edit -->
@foreach($data_site as $data)
<div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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
                        <label>Outlet Surrounding</label>
                        <input type="text" class="form-control" id="outlet_surrounding{{$data->id}}" value="{{$data->outlet_surrounding}}">
                    </div>
                    <div class="form-group">
                        <label>ONO</label>
                        <input type="text" class="form-control" id="ono{{$data->id}}" value="{{$data->ono}}">
                    </div>
                    <div class="form-group">
                        <label>Total Outlet</label>
                        <input type="text" class="form-control" id="total_outlet{{$data->id}}" value="{{$data->total_outlet}}">
                    </div>
                    <div class="form-group">
                        <label>URO</label>
                        <input type="text" class="form-control" id="uro{{$data->id}}" value="{{$data->uro}}">
                    </div>
                    <div class="form-group">
                        <label>SSO</label>
                        <input type="text" class="form-control" id="sso{{$data->id}}" value="{{$data->sso}}">
                    </div>
                    <div class="form-group">
                        <label>QURO</label>
                        <input type="text" class="form-control" id="quro{{$data->id}}" value="{{$data->quro}}">
                    </div>
                    <div class="form-group">
                        <label>QSSO</label>
                        <input type="text" class="form-control" id="qsso{{$data->id}}" value="{{$data->qsso}}">
                    </div>
                    <div class="form-group">
                        <label>Revenue</label>
                        <input type="text" class="form-control" id="revenue{{$data->id}}" value="{{$data->revenue}}">
                    </div>
                    <div class="form-group">
                        <label>GAP Revenue</label>
                        <input type="text" class="form-control" id="gap_revenue{{$data->id}}" value="{{$data->gap_revenue}}">
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
@endforeach
@endsection
@push('addon-script')
<script type="text/javascript">
$(document).ready(function() {
    $(function () {
        var table = $('.data-table').DataTable({
            processing  : true,
            serverSide  : true,
            scrollX     : true,
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

    $('.data-table').on('click','.delete_site',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var url = $(this).data('url');
        console.log(url);
        Swal.fire({
            title: 'Apa Anda Yakin?',
            text: "Anda Tidak Dapat Membatalkan Operasi Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token-delete"]').attr('content')
                    }
                });
                $.ajax({
                    url:url,
                    data:{id:id},
                    method:'DELETE',
                    success:function(data){
                    Swal.fire(
                        'Dihapus!',
                        'Data Site Berhasil Dihapus.',
                        'success'
                    )
                    setTimeout(function(){
                    location.reload();
                    }, 1000);
                    }
                });
            }
            })
    });
});
</script>
@endpush