@extends('layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data GMV</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('gmv.index')}}">Tabel data GMV</a></li>
                        <li class="breadcrumb-item active">Perbaharui data GMV</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{route('gmv.index')}}" id="edit-gmv-btn" onclick="return confirm('Anda yakin ingin membatalkan ini ?');">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1" id="edit-icon"><i class="fas fa-times"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number" id="edit-text">Batal</span>
                            <span class="info-box-text" id="edit-text-kecil">Ketuk untuk membatalkan</span>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Perbaharui data GMV tanggal {{$gmv->tanggal}} (GMV Id : {{$gmv->id_gmv}} )</h3>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{route('gmv.update',$gmv->id_gmv)}}" method="POST" id="editGmvForm">
                                @csrf
                                @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="tgl_edit">Tanggal</label>
                                            <input type="date" name="tgl" id="tgl_edit" class="form-control" value="{{$gmv->tanggal}}" placeholder="Masukkan GMV baru" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gmv_edit">GMV</label>
                                            <input type="number" name="gmv" id="gmv_edit" class="form-control" min=1 value="{{$gmv->gmv}}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan perubahan</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection