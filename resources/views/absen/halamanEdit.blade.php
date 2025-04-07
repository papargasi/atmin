@extends('layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Absensi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{route('absen.index')}}">Tabel data absensi</a></li>
                        <li class="breadcrumb-item">Edit data absensi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <a href="{{route('absen.index')}}" id="edit-gmv-btn">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1" id="edit-icon"><i class="fas fa-arrow-left"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-number" id="edit-text">Kembali</span>
                                <span class="info-box-text" id="edit-text-kecil">Ketuk untuk kembali ke halaman utama</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                @foreach($dataAbsen as $data)
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Tabel data absensi {{$data->nm_panggilan}}</h3><br>
                            <span class="float-left"><b>{{ $data->absens->where('status', 1)->count() }}</b> Hari kerja | <b>{{ $data->absens->where('status', 2)->count() }}</b> Hari libur | <b>{{ $data->absens->where('status', 3)->count() }}</b> Tidak masuk</span>
                            <form class="form-inline float-right" method="GET" action="{{ route('absen.filter', $data->id_host) }}">
                                <div class="input-group">
                                    <input 
                                        type="date" 
                                        class="form-control" 
                                        name="tanggal" 
                                        min="2025-03-18" 
                                        max="2025-04-16" 
                                        required 
                                        placeholder="Pilih tanggal">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive tbl-striped" style="max-height: 300px; overflow-x: auto;">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>Durasi</td>
                                            <td>Status</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data->absens as $absen) <!-- Mengakses relasi 'absens' -->
                                <tr>
                                    <td>{{ $absen->tanggal }}</td>
                                    @if( $absen->durasi == 0)
                                    <td class="text-center">-</td>
                                    @else
                                    <td class="text-center">{{ $absen->durasi }}</td>
                                    @endif
                                    @if($absen->status == 1)
                                    <td class="text-center text-success">Hadir</td>
                                    @endif
                                    @if($absen->status == 2)
                                    <td class="text-center text-warning">Libur</td>
                                    @endif
                                    @if($absen->status == 3)
                                    <td class="text-center text-danger">Alfa</td>
                                    @endif
                                    <td>
                                        <form method="POST" action="{{route('absen.destroy',$absen->id_absen)}}" >
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Apakah anda yakin ingin menghapus data absen milik {{$data->nm_panggilan}} pada tanggal {{$absen->tanggal}} ? ')" class="btn btn-danger sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>
</div>
@endsection