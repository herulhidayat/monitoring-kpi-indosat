@extends('layouts.master-admin')
@section('content')
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Indosat</a></li>
                <li class="breadcrumb-item"><a href="">Outlet</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Outlet</h5>
                        <table class="table table-bordered data-table" style="width:100%">
                            <meta name="csrf-token-delete" content="{{ csrf_token() }}">
                            <thead>
                                <tr>
                                    <th>Outlet ID</th>
                                    <th>Outlet Name</th>
                                    <th>Micro Cluster</th>
                                    <th>Category</th>
                                    <th>Saldo</th>
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
<div class="modal fade bd-example-modal-xl" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalCenterTitle">Edit Data Outlet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">
                <meta name="csrf-token-edit" content="{{ csrf_token() }}">
                    <input type="hidden" readonly class="form-control" name="number" id="id_outlet">
                    <div class="form-group">
                        <label>Saldo</label>
                        <input type="text" class="form-control" id="balance">
                    </div>
                    <div class="form-group">
                        <label>Transaksi Mobo</label>
                        <input type="text" class="form-control" id="mobo_transaction">
                    </div>
                    <div class="form-group">
                        <h5 class="card-title text-center">Sultan</h5>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label>Sultan Target</label>
                                <input type="text" class="form-control" id="sultan_target">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Sultan Achievement</label>
                                <input type="text" class="form-control" id="sultan_ach">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Sultan Percen</label>
                                <input type="text" class="form-control" id="sultan_percen">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="card-title text-center">Jawara</h5>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label>Jawara Target</label>
                                <input type="text" class="form-control" id="jawara_target">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Jawara Achievement</label>
                                <input type="text" class="form-control" id="jawara_ach">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Jawara Percen</label>
                                <input type="text" class="form-control" id="jawara_percen">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary editdata">Ubah</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script type="text/javascript">
$(document).ready(function() {
    $(function () {
        var table = $('.data-table').DataTable({
        initComplete: function (settings, json) {  
            $(".data-table").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
        processing  : true,
        serverSide  : true,
        
        ajax: "{{ route('outlet-data.index') }}",
        columns: [
            {data: 'outlet_id', name: 'outlet_id'},
            {data: 'outlet_name', name: 'outlet_name'},
            {data: 'micro_cluster', name: 'micro_cluster'},
            {data: 'category', name: 'category'},
            {data: 'balance', name: 'balance'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [ 0 , 'desc'],
        });
    });

    $('.data-table').on('click','.delete_outlet',function(e){
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

    $('.data-table').on('click','.edit_outlet',function(){
                        var id=$(this).data('id');
                        var balance=$(this).data('balance');
                        var mobo_transaction=$(this).data('mobo');
                        var sultan_target=$(this).data('starget');
                        var sultan_ach=$(this).data('sach');
                        var sultan_percen=$(this).data('spercen');
                        var jawara_target=$(this).data('jtarget');
                        var jawara_ach=$(this).data('jach');
                        var jawara_percen=$(this).data('jpercen');
            $('#editModal').modal('show');
                        $('#id_outlet').val(id);
                        $('#balance').val(balance);
                        $('#mobo_transaction').val(mobo_transaction);
                        $('#sultan_target').val(sultan_target);
                        $('#sultan_ach').val(sultan_ach);
                        $('#sultan_percen').val(sultan_percen);
                        $('#jawara_target').val(jawara_target);
                        $('#jawara_ach').val(jawara_ach);
                        $('#jawara_percen').val(jawara_percen);
      });

    $('.editdata').click(function(e){
        e.preventDefault();
        var id          = $('#id_outlet').val();
        var balance     = $('#balance').val();
        var mobo_transaction    = $('#mobo_transaction').val();
        var sultan_target   = $('#sultan_target').val();
        var sultan_ach  = $('#sultan_ach').val();
        var sultan_percen   = $('#sultan_percen').val();
        var jawara_target   = $('#jawara_target').val();
        var jawara_ach  = $('#jawara_ach').val();
        var jawara_percen   = $('#jawara_percen').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-edit"]').attr('content')
            }
        });
        $.ajax({
            url:'/outlet-data/edit/'+id,
            data:{id:id, balance:balance, mobo_transaction:mobo_transaction, sultan_target:sultan_target, sultan_ach:sultan_ach, sultan_percen:sultan_percen, jawara_target:jawara_target, jawara_ach:jawara_ach, jawara_percen:jawara_percen},
            method:'PUT',
            success:function(data){
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data Outlet Berhasil Diubah!',
                });
                setTimeout(function(){
                location.reload();
                }, 1000);
            }
        });
    });
});
</script>
@endpush