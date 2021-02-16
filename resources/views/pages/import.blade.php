@extends('layouts.master-admin')
@section('content')
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <div class="page-options">
            <a href="#" class="btn btn-primary">Upgrade</a>
        </div>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-lg">
                <div class="card" id="blockui-card-1">
                    <div class="card-body">
                        <h5 class="card-title">Import Data KPI dan Outlet</h5>
                        <p>Silahkan klik "Pilih" di bawah kemudian cari file KPI yang telah ada, setelah itu kilik tombol "Submit"</p>
                        <form>
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-primary rounded-pill" type="button">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Import Data Site</h5>
                        <p>Silahkan klik "Pilih" di bawah kemudian cari file KPI yang telah ada, setelah itu kilik tombol "Submit"</p>
                        <form>
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload"> 
                                <button class="btn btn-primary rounded-pill" type="button">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection