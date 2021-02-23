@extends('layouts.master-admin')
@section('content')
<?php
    $user = Auth::user(); 
?>
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Indosat</a></li>
                <li class="breadcrumb-item"><a href="">KPI</a></li>
                <li class="breadcrumb-item active" aria-current="page">Score</li>
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
                                    @if($user->role == "Admin")
                                    <th>Action</th>
                                    @endif
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
$(document).ready(function() {
    $(function () { 
        var table = $('.data-table').DataTable({
            initComplete: function (settings, json) {  
                $(".data-table").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
            },
            processing  : true,
            serverSide  : true,
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
                <?php if($user->role == "Admin"){?>
                {data: 'action', name: 'action', orderable: false, searchable: false},
                <?php }?>
            ],
            order: [ 0 , 'desc'],
        });
    });

    $('.data-table').on('click','.delete_kpi',function(e){
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