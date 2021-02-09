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
                                    <th>URO</th>
                                    <th>SSO</th>
                                    <th>QURO</th>
                                    <th>QSSO</th>
                                    <th>Revenue</th>
                                    <th>GAP Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Site ID</td>
                                    <td>Site Name</td>
                                    <td>URO</td>
                                    <td>SSO</td>
                                    <td>QURO</td>
                                    <td>QSSO</td>
                                    <td>Revenue</td>
                                    <td>GAP Revenue</td>
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