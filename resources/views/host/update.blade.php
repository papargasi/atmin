@extends('layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit data HOST</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('host.index')}}">Tabel data host</a></li>
                        <li class="breadcrumb-item active">Edit data host</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <a href="{{route('host.index')}}" id="edit-host-btn" onclick="return confirm('Anda yakin ingin membatalkan pengeditan ?');">
                <div class="info-box col-12 col-sm-6 col-md-3">
                    <span class="info-box-icon bg-danger elevation-1" id="edit-icon"><i class="fas fa-times"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-number" id="edit-text">Batal</span>
                        <span class="info-box-text" id="edit-text-kecil">
                            Ketuk untuk membatalkan
                        </span>
                    </div>
                </div>
            </a>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-transparent">
                        <h3 class="card-title">Edit data host milik <strong>{{$host->nm_host}}</strong></h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                <form action="{{ route('host.update', $host->id_host) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div style="text-align: center; margin-bottom: 20px;">
                                        <img src="{{ asset('img/host/' . $host->foto) }}" alt="Foto Host" 
                                            style="height:120px;width:120px;border-radius:50%;object-fit:cover;cursor:pointer;"
                                            data-toggle="modal" data-target="#fotoModal">
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nm_host">Nama Host</label>
                                            <input type="text" name="nm_host" id="nm_host" class="form-control" value="{{$host->nm_host}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status karyawan</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option hidden value="{{$host->status}}">{{$host->status}}</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Karyawan">Karyawan</option>
                                                <option value="Training">Training</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nm_panggilan">Nama Panggilan</label>
                                            <input type="text" name="nm_panggilan" id="nm_panggilan" class="form-control" value="{{$host->nm_panggilan}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control"  required>{{$host->alamat}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="bank">Bank</label>
                                            <select name="bank" id="bank" class="form-control" required>
                                                <option hidden value="{{$host->bank}}">{{$host->bank}}</option>
                                                <option value="DANA">Dana</option>
                                                <option value="OVO">Ovo</option>
                                                <option value="GOPAY">Gopay</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="norek">Nomor Rekening</label>
                                            <input type="text" name="norek" id="norek" class="form-control" value="{{$host->norek}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nohp">Nomor HP</label>
                                            <input type="text" name="nohp" id="nohp" class="form-control" value="{{$host->nohp}}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="fotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoModalLabel">Kelola Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <button type="button" class="btn btn-warning" onclick="document.getElementById('fotoInput').click();">Ganti Foto</button>
                <form action="{{ route('host.deletePhoto', $host->id_host) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus Foto</button>
                </form>
                <form id="photoForm" action="{{ route('host.updatePhoto', $host->id_host) }}" method="POST" enctype="multipart/form-data" style="display: none;">
                    @csrf
                    @method('PUT')
                    <input type="file" id="fotoInput" name="foto" onchange="document.getElementById('photoForm').submit();">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
