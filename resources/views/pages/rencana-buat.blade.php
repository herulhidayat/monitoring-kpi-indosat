@extends('layouts.master-admin')
@section('content')
<div class="page-content">
    <div class="main-wrapper container">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Buat Rencana</h5>
                        <form>
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Rencana/Target</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <div>
                                <label>Pilih CSO:</label>
                                <div class="custom-control custom-checkbox form-group">
                                    <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                    <label class="custom-control-label" for="exampleCheck1">IDCSO1</label>
                                </div>
                                <div class="custom-control custom-checkbox form-group">
                                    <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                    <label class="custom-control-label" for="exampleCheck1">IDCSO2</label>
                                </div>
                                <div class="custom-control custom-checkbox form-group">
                                    <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                    <label class="custom-control-label" for="exampleCheck1">IDCSO3</label>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection