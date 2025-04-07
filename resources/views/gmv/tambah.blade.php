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
                        <li class="breadcrumb-item active">Tambah data GMV hari ini, {{$gmvSekarang->tanggal}}</li>
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
                            <h3 class="card-title">Tambah data GMV hari ini, {{$gmvSekarang->tanggal}}</h3>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{ route('gmv.tambah', $gmvSekarang->id_gmv) }}" method="POST" id="tambahGmvForm">
                                @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="gmv_sekarang">GMV Saat Ini</label>
                                            <input type="text" id="gmv_sekarang" class="form-control" readonly value="Rp. {{ number_format($gmvSekarang->gmv, 0, ',', '.') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="gmv_baru">Tambah GMV</label>
                                            <input type="number" name="gmv_baru" id="gmv_baru" min=1 class="form-control" placeholder="Masukkan GMV baru" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan tambahan GMV baru</button>
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