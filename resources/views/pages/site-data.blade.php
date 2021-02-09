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
                                    <th>Site ID</th>
                                    <th>Site Name</th>
                                    <th>Micro Cluster</th>
                                    <th>Site Coverage</th>
                                    <th>Status</th>
                                    <th>Outlet Surrounding</th>
                                    <th>ONO</th>
                                    <th>Total Outlet</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>28UPD001</td>
                                    <td>Panakukang_indah_pl</td>
                                    <td>Makassar Kota 2</td>
                                    <td>Macro</td>
                                    <td>Active</td>
                                    <td>2</td>
                                    <td>0</td>
                                    <td>8</td>
                                </tr>
                                <tr>
                                    <td>28UPD001</td>
                                    <td>Bumisudiang_permai_upd_pl</td>
                                    <td>Makassar Kota 2</td>
                                    <td>Macro</td>
                                    <td>Active</td>
                                    <td>2</td>
                                    <td>0</td>
                                    <td>8</td>
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