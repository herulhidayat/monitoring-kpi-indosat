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
                        <table id="complex-header" class="display" style="width:100%">
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
                                <tr>
                                    <td>1232131</td>
                                    <td>herul cell 09</td>
                                    <td>1.000.000</td>
                                    <td>500.000</td>
                                    <td>100.000</td>
                                    <td>90.000</td>
                                    <td>90%</td>
                                    <td>100.000</td>
                                    <td>90.000</td>
                                    <td>90%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection