<?php
$gajiTotalAdmin = "2600000";
$gajiTotalKaryawan = "2600000";
$gajiTotalTraining = "2500000";

?>
@extends('layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Gaji</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{route('welcome')}}">Home</a></li>
                        <li class="breadcrumb-item">Edit data gaji</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Tabel data Gaji</h3><br>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive tbl-striped" style="max-height: 300px; overflow-x: auto;">
                        <table class="table m-0">
                            <thead>    
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td><b>Total hari kerja</b></td>
                                    <td>Durasi total</b></td>
                                    <td><b>Gaji per jam</b></td>
                                    <td><b>Gaji total</b></td>
                                    <td><b>Aksi</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataGaji as $data)
                                <tr>
                                    <td>{{$data->nm_host}}</td>
                                    <td>{{$data->total_kerja}} Hari</td>
                                    <td>{{$data->total_durasi}} Jam</td>
                                    @if($data->status == 'Admin')
                                    <td>Rp <?php echo number_format(($gajiTotalAdmin/26)/6) ?></td>
                                    <td>Rp {{ number_format($data->total_durasi * (($gajiTotalAdmin/26)/6), 0, ',',',') }}</td>
                                    <td>
                                        <form action="{{route('gaji.halamanBayar',$data->id_host)}}">
                                            <button class="btn btn-primary btn-block">Lunasi</button>
                                        </form>
                                    </td>
                                    @elseif($data->status == 'Training')
                                    <td>Rp <?php echo number_format(($gajiTotalTraining/26)/6) ?></td>
                                    <td>Rp {{ number_format($data->total_durasi * (($gajiTotalTraining/26)/6), 0, ',',',') }}</td>
                                    <td>
                                        <form action="{{route('gaji.halamanBayar',$data->id_host)}}">
                                            <button class="btn btn-primary btn-block">Lunasi</button>
                                        </form>
                                    </td>
                                    @elseif($data->status == 'Karyawan')
                                    <td>Rp <?php echo number_format(($gajiTotalTraining/26)/6) ?></td>
                                    <td>Rp {{ number_format($data->total_durasi * (($gajiTotalTraining/26)/6), 0, ',',',') }}</td>
                                    <td>
                                        <form action="{{route('gaji.halamanBayar',$data->id_host)}}">
                                            <button class="btn btn-primary btn-block">Lunasi</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </section>
</div>
@endsection
                        