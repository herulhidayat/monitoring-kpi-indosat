@extends('layouts.master-admin')
@section('content')
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Indosat</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="javascript:void(0);" class="dropdown float-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="margin-top: 10px">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li style="padding: 7px 18px;">
                                <a href="#" data-toggle="modal" data-target="#tambahModal">Tambah User</a>
                            </li>
                        </ul>
                        <h5 class="card-title">Data User</h5>
                        <table class="table table-bordered data-table" style="width:100%">
                            <meta name="csrf-token-delete" content="{{ csrf_token() }}">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Micro Cluster</th>
                                    <th>Level</th>
                                    <th>Terakhir Login</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_user as $data)
                                <?php $last_login = 'Belum Pernah Login'; ?>
                                @if($data->last_login !== NULL)
                                    <?php $last_login = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->last_login)->format('H:i:s | d/m/Y');
                                ?>
                                @endif
                                <tr>
                                    <td>{{$data->username}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->micro_cluster_user}}</td>
                                    <td>{{$data->role}}</td>
                                    <td>{{$last_login}}</td>
                                     <td>
                                        <button type="button" class="btn btn-warning btn-xs" style="height: 30px; width: 30px" href="#" data-toggle="modal" data-target="#editModal{{$data->id}}">
                                            <i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">create</i>
                                        </button>
                                            <button type="button" class="btn btn-danger btn-xs deleteuser" data-id="{{$data->id}}" data-url="{{ route('user.destroy', $data->id) }}" style="height: 30px; width: 30px">
                                            <i class="material-icons-outlined" style="vertical-align: middle; font-size: 18px">delete</i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </buttn>
                                    </div>
                                    <div class="modal-body">
                                            <meta name="csrf-token-create" content="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="username">Username :</label>
                                                <input type="text" class="form-control" id="username_create" name="username" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nama :</label>
                                                <input type="text" class="form-control" id="name_create" name="name" required autofocus autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Level :</label>
                                                <select class="custom-select form-control" onchange="getlevel()" id="role_create" name="role">
                                                    <option value="" selected disabled>-- Pilih Level --</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="SPV">SPV</option>
                                                    <option value="CSO">CSO</option>
                                                </select>
                                            </div>
                                            <div id="hideopt" class="form-group">
                                                <label for="micro_cluster">Micro Cluster :</label>
                                                <input type="text" class="form-control" id="cluster_create" name="micro_cluster" autofocus autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password :</label>
                                                <input type="password" class="form-control" id="password_create" name="password" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password :</label>
                                                <input type="password" class="form-control" id="password_confirmation_create" name="password_confirmation" required autocomplete="off">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary adduser" data-url="{{ route('user.store') }}">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($data_user as $data)
                        <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </buttn>
                                    </div>
                                    <div class="modal-body">
                                            <meta name="csrf-token-edit" content="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="username">Username :</label>
                                                <input type="text" class="form-control" id="username_edit{{$data->id}}" value="{{$data->username}}" name="username" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nama :</label>
                                                <input type="text" class="form-control" id="name_edit{{$data->id}}" value="{{$data->name}}" name="name" required autofocus autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Level :</label>
                                                @if($data->role !== 'Admin')
                                                <select class="custom-select form-control" onchange="getlevel2(<?=$data->id?>)" id="role_edit{{$data->id}}" name="role">
                                                @else
                                                <select class="custom-select form-control" onchange="getlevel1(<?=$data->id?>)" id="role_edit{{$data->id}}" name="role">
                                                @endif
                                                    <option value="Admin" {{($data->role == 'Admin') ? 'selected' : '' }}>Admin</option>
                                                    <option value="SPV" {{($data->role == 'SPV') ? 'selected' : '' }}>SPV</option>
                                                    <option value="CSO" {{($data->role == 'CSO') ? 'selected' : '' }}>CSO</option>
                                                </select>
                                            </div>
                                            @if($data->role !== 'Admin')
                                            <div id="hideopt2{{$data->id}}" class="form-group">
                                            @else
                                            <div id="hideopt1{{$data->id}}" style="display: none;" class="form-group">
                                            @endif
                                                <label for="micro_cluster">Micro Cluster :</label>
                                                <input type="text" class="form-control" id="cluster_edit{{$data->id}}" value="{{$data->micro_cluster_user}}" name="micro_cluster" required autofocus autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password :</label>
                                                <input type="password" class="form-control" id="password_edit{{$data->id}}" name="password" required autocomplete="off">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary edituser" data-oldname="{{$data->name}}" data-oldusername="{{$data->username}}" data-oldrole="{{$data->role}}" data-oldpassword="{{$data->password}}" data-oldcluster="{{$data->micro_cluster_user}}" data-id="{{$data->id}}" data-url="{{ route('user.update', $data->id) }}">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
@endsection
@push('addon-script')
<script>
    function initialize() {
        var d = document.getElementById("hideopt");
            d.style.display = "none";
    }
    initialize();

    function getlevel(){
             
        if (document.getElementById("role_create").value =='SPV' || document.getElementById("role_create").value =='CSO')
        {
            var d = document.getElementById("hideopt");
            d.style.display = "block";
        }
        else
        {
            var d = document.getElementById("hideopt");
            d.style.display = "none";    
        }
    }

    function getlevel1($id){
             
        if (document.getElementById("role_edit" + $id).value =='SPV' || document.getElementById("role_edit" + $id).value =='CSO')
        {
            var d = document.getElementById("hideopt1" + $id);
            d.style.display = "block";
        }
        else
        {
            var d = document.getElementById("hideopt1" + $id);
            d.style.display = "none";    
        }
    }
    function getlevel2($id){
             
        if (document.getElementById("role_edit" + $id).value =='SPV' || document.getElementById("role_edit" + $id).value =='CSO')
        {
            document.getElementById("hideopt2" + $id).style.display = "block";
        }
        else
        {
            document.getElementById("hideopt2" + $id).style.display = "none";
        }
            
    }

$(document).ready(function() {
    $('.adduser').click(function(e){
        e.preventDefault();
        var url = $(this).data('url');
        var name = $('#name_create').val();
        var username = $('#username_create').val();
        var role = $('#role_create').val();
        var micro_cluster_user = $('#cluster_create').val();
        var password = $('#password_create').val();
        var password_confirmation = $('#password_confirmation_create').val();
        console.log(micro_cluster_user);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-create"]').attr('content')
            }
        });
        $.ajax({
            url:url,
            data:{name:name, username:username, role:role, password:password, password_confirmation:password_confirmation, micro_cluster_user:micro_cluster_user},
            method:'POST',
            success:function(data){
                if(data.errors) {
                    var values = '';
                    $.each(data.errors, function (key, value) {
                        values = value
                    });

                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: values,
                });
                }else {
                    Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'User Berhasil Ditambahkan!',
                });
                    setTimeout(function(){
                    location.reload();
                    }, 1000);
                }
            }
        });
    })
    $('.edituser').click(function(e){
        e.preventDefault();
        var url = $(this).data('url');
        var id = $(this).data('id');
        var old_name = $(this).data('oldname');
        var old_username = $(this).data('oldusername');
        var old_role = $(this).data('oldrole');
        var old_password = $(this).data('oldpassword');
        var old_micro_cluster_user = $(this).data('oldcluster');
        var name = $('#name_edit' + id).val();
        var username = $('#username_edit' + id).val();
        var role = $('#role_edit' + id).val();
        var micro_cluster_user = $('#cluster_edit' + id).val();
        var password = $('#password_edit' + id).val();
        console.log(old_password);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-edit"]').attr('content')
            }
        });
        $.ajax({
            url:url,
            data:{name:name, username:username, role:role, micro_cluster_user:micro_cluster_user, password:password, id:id, old_name:old_name, old_username:old_username, old_role:old_role, old_micro_cluster_user:old_micro_cluster_user, old_password:old_password},
            method:'PUT',
            success:function(data){
                if(data.errors) {
                    var values = '';
                    $.each(data.errors, function (key, value) {
                        values = value
                    });

                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: values,
                });
                }else if(data.nothing){
                    Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: data.nothing,
                });
                    setTimeout(function(){
                    location.reload();
                    }, 1000);
                }else {
                    Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data User Berhasil Diubah!',
                });
                    setTimeout(function(){
                    location.reload();
                    }, 1000);
                }
            }
        });
    });
    $('.deleteuser').click(function(e){
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
                        'Data User Berhasil Dihapus.',
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