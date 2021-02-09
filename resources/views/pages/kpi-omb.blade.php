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
                        <table id="complex-header" class="dispaly" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="2">ID CSO</th>
                                    <th rowspan="2">Nama CSO</th>
                                    <th rowspan="2">Micro Cluster</th>
                                    <th colspan="3">OMB</th>
                                </tr>
                                <tr>
                                    <th>Target</th>
                                    <th>Ach</th>
                                    <th>Percen</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>BYGMKS01</td>
                                    <td>Sudirman</td>
                                    <td>Makassar Kota 2</td>
                                    <td>10</td>
                                    <td>10</td>
                                    <td>9</td>
                                    <td>5</td>
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