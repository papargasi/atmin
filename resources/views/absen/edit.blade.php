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
                    <a href="{{route('absen.halamanEdit')}}" id="edit-gmv-btn">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1" id="edit-icon"><i class="fas fa-arrow-left"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-number" id="edit-text">Batal</span>
                                <span class="info-box-text" id="edit-text-kecil">Ketuk untuk membatalkan pencarian</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
                @foreach($dataAbsen as $data)
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Tabel data absensi {{$data->nm_panggilan}}</h3><br>
                            <form class="form-inline float-right" method="GET" action="{{ route('absen.filter', $data->id_host) }}">
                                <div class="input-group">
                                    <input 
                                        type="date" 
                                        class="form-control" 
                                        name="tanggal" 
                                        min="2025-01-10" 
                                        max="2025-02-08" 
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
                                            <td class="text-center">Durasi</td>
                                            <td class="text-center">Status</td>
                                            <td class="text-center">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($data->absens->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">{{$data->nm_panggilan}} tidak memiliki data absensi pada tanggal tersebut</td>
                                    </tr>
                                    @endif
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
                                    <td class="text-center">
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
                @endforeach
        </div>
</section>
</div>
@endsection