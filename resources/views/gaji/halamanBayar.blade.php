<?php
$gajiPerJam = 100000/6;
$gajiTotal = $gajiPerJam*26;

?>
@extends('layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Pembayaran Gaji</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{route('welcome')}}">Home</a></li>
                        <li class="breadcrumb-item">Halaman pembayaran gaji</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{route('gaji.index')}}" id="edit-gmv-btn">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1" id="edit-icon"><i class="fas fa-arrow-left"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-number" id="edit-text">Batal</span>
                                <span class="info-box-text" id="edit-text-kecil">Ketuk untuk kembali</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <a href="{{ route('gaji.cetak', $host->id_host) }}" target="_blank" id="edit-gmv-btn">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1" id="edit-icon"><i class="fas fa-print"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-number" id="edit-text">Cetak</span>
                                <span class="info-box-text" id="edit-text-kecil">Ketuk untuk mencetak & menyimpan PDF</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-footer border-transparent">
                    <h3 class="text-center"><b>KWITANSI GAJI</b></h3>
                </div>
                <div class="card-header">
                    <h4 class="text-center">{{$host->nm_host}}</h4>
                </div>
            </div>
            <div class="ml-4 mb-3">
            <table>
                <tr>
                    <td>Nama</td>
                    <td width="25px" align="center">:</td>
                    <td>{{$host->nm_panggilan}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td width="25px" align="center">:</td>
                    <td>{{$host->alamat}}</td>
                </tr>
                <tr>
                    <td>Perbangkan</td>
                    <td width="25px" align="center">:</td>
                    <td>{{$host->bank}}</td>
                </tr>
                <tr>
                    <td>Norek</td>
                    <td width="25px" align="center">:</td>
                    <td>{{$host->norek}}</td>
                </tr>
            </table>
            </div>
            <div class="card">
                <div class="card-body p-0">
                    <table class="table m-0">
                        <tr class="card-footer">
                            <td>Total hari kerja</td>
                            <td>Total Durasi</td>
                            <td>Gaji per jam</td>
                            <td>Subtotal</td>
                        </tr>
                        <tr class="card-body">
                            <td>{{$dataGaji->total_kerja}} hari</td>
                            <td>{{$dataGaji->total_durasi}} Jam</td>
                            <td>Rp <?php echo number_format($gajiPerJam) ?></td>
                            <td>Rp {{ number_format($dataGaji->total_durasi * $gajiPerJam, 0, ',',',') }}</td>
                        </tr>
                        <tr class="card-footer">
                            <td colspan="3" class="text-right">Total</td>
                            <td>Rp {{ number_format($dataGaji->total_durasi * $gajiPerJam, 0, ',',',') }}</td>
                        </tr>
                    </table>    
                    <div>
                        <a href="{{ route('gaji.cetak', $host->id_host) }}" target="_blank" id="edit-gmv-btn" class="btn btn-success btn-block"><span id="edit-icon"><i class="fas fa-print"></i></span> 
                        Cetak dan simpan kwitansi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection