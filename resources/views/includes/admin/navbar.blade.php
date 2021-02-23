<?php 
    $current_user = auth()->user();
?>
<div class="page-header">
    <nav class="navbar navbar-expand container">
        <ul class="navbar-nav">
            <li class="nav-item small-screens-sidebar-link">
                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('admin/images/avatars/profile-image-2.png')}}" alt="profile image">
                    <span>{{auth()->user()->name}}</span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editProfile{{$current_user->id}}">Profil</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editPassword{{$current_user->id}}">Ubah Password</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">Log out</a>
                        </form>
                </div>
            </li>
        </ul>
        <div class="navbar-collapse">
            <div class="navbar-nav">
                <div class="logo-box"><a href="#" class="logo-text">indosat makassar</a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>         
    </nav>
</div>
                        <div class="modal fade" id="editProfile{{$current_user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </buttn>
                                    </div>
                                    <div class="modal-body">
                                            <meta name="csrf-token-editprofile" content="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="username">Username :</label>
                                                @if($current_user->role == 'Admin')
                                                <input type="text" class="form-control" id="current_username" value="{{$current_user->username}}" name="username" required autocomplete="off">
                                                @else
                                                <input type="text" class="form-control" readonly id="current_username" value="{{$current_user->username}}" name="username" required autocomplete="off">
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nama :</label>
                                                <input type="text" class="form-control" id="current_name" value="{{$current_user->name}}" name="name" required autofocus autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="micro_cluster">Role :</label>
                                                <input type="text" readonly class="form-control" name="current_role" id="current_role" value="{{$current_user->role}}" name="name" required autofocus autocomplete="off">
                                            </div>
                                            @if($current_user->role !== 'Admin')
                                            <div class="form-group">
                                                <label for="micro_cluster">Micro Cluster :</label>
                                                <input type="text" readonly class="form-control" id="current_cluster" value="{{$current_user->micro_cluster_user}}" name="name" required autofocus autocomplete="off">
                                            </div>
                                            @endif
                                            <input type="hidden" name="current_password" id="current_password" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary editprofile" data-oldname="{{$current_user->name}}" data-oldusername="{{$current_user->username}}" data-oldrole="{{$current_user->role}}" data-oldpassword="{{$current_user->password}}" data-oldcluster="{{$current_user->micro_cluster_user}}" data-id="{{$current_user->id}}" data-url="{{ route('editProfile', $current_user->id) }}">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editPassword{{$current_user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </buttn>
                                    </div>
                                    <div class="modal-body">
                                            <meta name="csrf-token-editpassword" content="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label for="name">Current Password :</label>
                                                <input type="password" class="form-control" id="password_before" name="password_before" required autofocus autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">New Password :</label>
                                                <input type="password" class="form-control" id="password_new" name="password_new" required autofocus autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Confirm Password :</label>
                                                <input type="password" class="form-control" id="password_confirm" name="password_confirm" required autofocus autocomplete="off">
                                            </div>
                                            <input type="hidden" name="password_check" id="password_check" value="{{$current_user->password}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary editpassword" data-id="{{$current_user->id}}" data-url="{{ route('editPassword', $current_user->id) }}">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
@push('addon-script')
<script type="text/javascript">
$(document).ready(function() {
    $('.editprofile').click(function(e){
        e.preventDefault();
        var url = $(this).data('url');
        var id = $(this).data('id');
        var old_name = $(this).data('oldname');
        var old_username = $(this).data('oldusername');
        var old_role = $(this).data('oldrole');
        var old_password = $(this).data('oldpassword');
        var old_micro_cluster_user = $(this).data('oldcluster');
        var name = $('#current_name').val();
        var username = $('#current_username').val();
        var role = $('#current_role').val();
        var micro_cluster_user = $('#current_cluster').val();
        var password = $('#current_password').val();
        console.log(old_password);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-editprofile"]').attr('content')
            }
        });
        $.ajax({
            url:url,
            data:{name:name, username:username, role:role, micro_cluster_user:micro_cluster_user, password:password, id:id, old_name:old_name, old_username:old_username, old_role:old_role, old_micro_cluster_user:old_micro_cluster_user, old_password:old_password},
            method:'PUT',
            success:function(data){
                console.log(data.nothing);
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
    $('.editpassword').click(function(e){
        e.preventDefault();
        var url = $(this).data('url');
        var id = $(this).data('id');
        var old_password = $('#password_check').val();
        var current_password = $('#password_before').val();
        var new_password = $('#password_new').val();
        var confirm_password = $('#password_confirm').val();
        console.log(old_password);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token-editpassword"]').attr('content')
            }
        });
        $.ajax({
            url:url,
            data:{id:id, current_password:current_password, new_password:new_password, confirm_password:confirm_password, old_password:old_password},
            method:'PUT',
            success:function(data){
                console.log(data.nothing);
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
});

</script>

@endpush