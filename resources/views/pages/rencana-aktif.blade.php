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
                <li class="breadcrumb-item active" aria-current="page">Aktif</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rencana Aktif</h5>
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
                                    <th>Konfirmasi</th>
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
<!-- ini modalnya -->
<div class="modal fade rincian-hasil" id="doneRencana" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Rincian Hasil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <meta name="csrf-token-done" content="{{ csrf_token() }}">
            <div class="modal-body">
                <input type="hidden" readonly class="form-control" name="number" id="id_rencana">
                <div class="form-group">
                    <label>Silahkan masukkan rincian hasil:</label>
                    <textarea class="form-control" id="keterangan_rencana" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary donerencana">Done</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="editModalRencana" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalCenterTitle">Edit Rencana</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">
                <meta name="csrf-token-edit" content="{{ csrf_token() }}">
                <input type="hidden" readonly class="form-control" id="id_rencana_edit">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" required id="judul">
                    </div>
                    <div class="form-group">
                        <label>Rencana/Target</label>
                        <textarea class="form-control" rows="3" required id="isi"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Batas Waktu</label>
                        <input type="date"class="form-control" rows="3" required id="rencana_end">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary editdata">Submit</button>
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
            ajax: "{{ route('rencana.index') }}",
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
                {data: 'konfirmasi', name: 'action', orderable: false, searchable: false},
                <?php if($user->role == 'Admin' || $user->role == 'SPV'){ ?>
                {data: 'action', name: 'action', orderable: false, searchable: false},
                <?php } ?>
            ],
            <?php if($user->role == 'Admin' || $user->role == 'CSO'){ ?>
            order: [ 5 , 'desc'],
            <?php }else{ ?>
            order: [ 4 , 'desc'],
            <?php } ?>
        });
    });

    $('.data-table').on('click','.check_rencana',function(){
                        var id=$(this).data('id');
            $('#doneRencana').modal('show');
                        $('#id_rencana').val(id);
    });

    $('.donerencana').click(function(e){
        e.preventDefault();
        var id      = $('#id_rencana').val();
        var ket     = $('#keterangan_rencana').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-done"]').attr('content')
            }
        });
        $.ajax({
            url: '/rencana/done/'+id,
            data:{id:id, ket:ket},
            method:'PUT',
            success:function(data){
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Rencana/Target Diselesaikan',
                });
                setTimeout(function(){
                location.reload();
                }, 1000);
            }
        });
    });

    $('.data-table').on('click','.edit_rencana',function(){
                        var id=$(this).data('id');
                        var judul=$(this).data('judul');
                        var isi=$(this).data('isi');
                        var rencana_end=$(this).data('end');
            $('#editModalRencana').modal('show');
                        $('#id_rencana_edit').val(id);
                        $('#judul').val(judul);
                        $('#isi').val(isi);
                        $('#rencana_end').val(rencana_end)
    });

    $('.editdata').click(function(e){
        e.preventDefault();
        var id              = $('#id_rencana_edit').val();
        var judul           = $('#judul').val();
        var isi             = $('#isi').val();
        var rencana_end     = $('#rencana_end').val();
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-edit"]').attr('content')
            }
        });
        $.ajax({
            url: '/rencana/edit/'+id,
            data:{id:id, judul:judul, isi:isi, rencana_end:rencana_end},
            method:'PUT',
            success:function(data){
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Rencana Berhasil Diubah!',
                });
                setTimeout(function(){
                location.reload();
                }, 1000);
            }
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