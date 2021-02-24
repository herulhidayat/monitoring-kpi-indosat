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