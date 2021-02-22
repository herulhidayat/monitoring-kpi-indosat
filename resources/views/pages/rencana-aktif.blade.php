@extends('layouts.master-admin')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transaksi Outlet</h5>
                        <table class="table table-bordered data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="2">Outlet ID</th>
                                    <th rowspan="2">Outlet Name</th>
                                    <th rowspan="2">Saldo</th>
                                    <th rowspan="2">Transaksi MOBO</th>
                                    <th colspan="3">Sultan</th>
                                    <th colspan="3">Jawara</th>
                                </tr>
                                <tr>
                                    <th>Target</th>
                                    <th>Ach</th>
                                    <th>Percen</th>
                                    <th>Target</th>
                                    <th>Ach</th>
                                    <th>Percen</th>
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