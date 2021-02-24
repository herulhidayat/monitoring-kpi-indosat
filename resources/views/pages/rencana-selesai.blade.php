@extends('layouts.master-admin')
@section('content')
<?php 
    $user = $user = Auth::user();
?>
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Indosat</a></li>
                <li class="breadcrumb-item"><a href="">Rencana</a></li>
                <li class="breadcrumb-item active" aria-current="page">Selesai</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rencana Selesai</h5>
                        <table class="table table-bordered data-table" style="width:100%">
                            <meta name="csrf-token-delete" content="{{ csrf_token() }}">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Isi Rencana/Target</th>
                                    <th>Nama CSO</th>
                                    @if($user->role == 'Admin' || $user->role == 'CSO')
                                    <th>Nama SPV</th>
                                    @endif
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    @if($user->role == 'Admin' || $user->role == 'SPV')
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
            ajax: "{{ route('rencana.selesai') }}",
            columns: [
                {data: 'DT_RowIndex', searchable: false},
                {data: 'judul', name: 'judul'},
                {data: 'isi', name: 'isi'},
                {data: 'nama_cso', name: 'nama_cso'},
                <?php if($user->role == 'Admin' || $user->role == 'CSO'){ ?>
                {data: 'nama_spv', name: 'nama_spv'},
                <?php } ?>
                {data: 'rencana_start', name: 'rencana_start'},
                {data: 'rencana_end', name: 'rencana_end'},
                {data: 'status', name: 'status'},
                {data: 'keterangan', name: 'keterangan'},
                <?php if($user->role == 'Admin' || $user->role == 'SPV'){ ?>
                {data: 'action', name: 'action', orderable: false, searchable: false},
                <?php } ?>
            ],
            order: [ 0 , 'desc'],
        });
    });

    $('.data-table').on('click','.delete_rencana',function(e){
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
                        'Data Berhasil Dihapus.',
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