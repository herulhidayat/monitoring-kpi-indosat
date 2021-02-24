@extends('layouts.master-admin')
@section('content')
<div class="page-content">
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Indosat</a></li>
                <li class="breadcrumb-item"><a href="">Rencana</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat</li>
            </ol>
        </nav>
    </div>
    <div class="main-wrapper container">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Buat Rencana</h5>
                        <form method="POST" action="{{ route('rencana.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" required name="judul">
                            </div>
                            <div class="form-group">
                                <label>Rencana/Target</label>
                                <textarea class="form-control" rows="3" required name="isi"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Batas Waktu</label>
                                <input type="date"class="form-control" rows="3" required name="rencana_end">
                            </div>
                            <div>
                                <label>Pilih CSO:</label>
                                @foreach($data_cso as $data)
                                <div class="custom-control custom-checkbox form-group">
                                    <input type="checkbox" class="custom-control-input" name="cso[]" id="{{$data->username}}" value="{{$data->id}}">
                                    <label class="custom-control-label" for="{{$data->username}}">{{$data->username}}</label>
                                </div>
                                @endforeach
                            </div>
                            
                            <button type="submit" onclick="check()" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection