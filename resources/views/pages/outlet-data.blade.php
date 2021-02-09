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
                                    <th>Outlet ID</th>
                                    <th>Outlet Name</th>
                                    <th>Micro Cluster</th>
                                    <th>Site Area</th>
                                    <th>Category</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1232131</td>
                                    <td>herul cell 09</td>
                                    <td>Makassar Kota 2</td>
                                    <td>Paccerakkang_TB</td>
                                    <td>Outlet Retail</td>
                                    <td>-5.212131</td>
                                    <td>119.91231</td>
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