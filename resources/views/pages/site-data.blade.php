@extends('layouts.master-admin')
@section('content')
<?php $upload = 'Belum Ada Data' ?>
@foreach($data_upload as $data)
@if($data->waktu_upload !== null)
    <?php
        $upload = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->waktu_upload)->format('H:i:s | d/m/Y');
    ?>
    @endif
@endforeach
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Indosat</a></li>
                <li class="breadcrumb-item"><a href="">Site</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalCenterTitle">Edit Data Outlet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">
                <meta name="csrf-token-edit" content="{{ csrf_token() }}">
                    <input type="hidden" readonly class="form-control" name="number" id="id_site">
                    <div class="form-group">
                        <label>Outlet Surrounding</label>
                        <input type="text" class="form-control" name="number" id="outlet_surrounding">
                    </div>
                    <div class="form-group">
                        <label>ONO</label>
                        <input type="text" class="form-control" name="number" id="ono">
                    </div>
                    <div class="form-group">
                        <label>Total Outlet</label>
                        <input type="text" class="form-control" name="number" id="total_outlet">
                    </div>
                    <div class="form-group">
                        <label>URO</label>
                        <input type="text" class="form-control" name="number" id="uro">
                    </div>
                    <div class="form-group">
                        <label>SSO</label>
                        <input type="text" class="form-control" name="number" id="sso">
                    </div>
                    <div class="form-group">
                        <label>QURO</label>
                        <input type="text" class="form-control" name="number" id="quro">
                    </div>
                    <div class="form-group">
                        <label>QSSO</label>
                        <input type="text" class="form-control" name="number" id="qsso">
                    </div>
                    <div class="form-group">
                        <label>Revenue</label>
                        <input type="text" class="form-control" name="number" id="revenue">
                    </div>
                    <div class="form-group">
                        <label>GAP Revenue</label>
                        <input type="text" class="form-control" name="number" id="gap_revenue">
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
    $(function() { 
        $("input[name='number']").on('input', function(e) { 
            $(this).val($(this).val().replace(/[^0-9 & . & -]/g, '')); 
        }); 
    });

    $(function () {
        var table = $('.data-table').DataTable({
            initComplete: function (settings, json) {  
                $(".data-table").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
            },
            processing  : true,
            serverSide  : true,
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

    $('.data-table').on('click','.edit_site',function(){
                        var id=$(this).data('id');
                        var outlet_surrounding=$(this).data('surrounding');
                        var ono=$(this).data('ono');
                        var total_outlet=$(this).data('total');
                        var uro=$(this).data('uro');
                        var sso=$(this).data('sso');
                        var quro=$(this).data('quro');
                        var qsso=$(this).data('qsso');
                        var revenue=$(this).data('revenue');
                        var gap_revenue=$(this).data('gap');
            $('#editModal').modal('show');
                        $('#id_site').val(id);
                        $('#outlet_surrounding').val(outlet_surrounding);
                        $('#ono').val(ono);
                        $('#total_outlet').val(total_outlet);
                        $('#uro').val(uro);
                        $('#sso').val(sso);
                        $('#quro').val(quro);
                        $('#qsso').val(qsso);
                        $('#revenue').val(revenue);
                        $('#gap_revenue').val(gap_revenue);
      });

    $('.editdata').click(function(e){
        e.preventDefault();
        var id      = $('#id_site').val();
        var outlet_surrounding  = $('#outlet_surrounding').val();
        var ono     = $('#ono').val();
        var total_outlet    = $('#total_outlet').val();
        var uro     = $('#uro').val();
        var sso     = $('#sso').val();
        var quro    = $('#quro').val();
        var qsso    = $('#qsso').val();
        var revenue = $('#revenue').val();
        var gap_revenue     = $('#gap_revenue').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-edit"]').attr('content')
            }
        });
        $.ajax({
            url: '/site-data/edit/'+id,
            data:{id:id, outlet_surrounding:outlet_surrounding, ono:ono, total_outlet:total_outlet, uro:uro, sso:sso, quro:quro, qsso:qsso, revenue:revenue, gap_revenue:gap_revenue},
            method:'PUT',
            success:function(data){
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data Site Berhasil Diubah!',
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