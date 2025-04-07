
@extends('layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        @if (session('success'))
            <div class="row alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Absensi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tabel data absensi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{route('absen.halamanEdit')}}" id="edit-gmv-btn">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1" id="edit-icon"><i class="fas fa-edit"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-number" id="edit-text">Edit data absen</span>
                                <span class="info-box-text" id="edit-text-kecil">Ketuk untuk mengedit</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <a type="button" id="tambahData" data-toggle="modal" data-target="#addAbsenModal">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number">Tambah data absen</span>
                            <span class="info-box-text">Ketuk untuk menambah Data</span>
                        </div>
                    </div>
                    </a>
                </div>
                @include('absen.add')
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Tabel data absensi periode 18 Maret s/d 16 April 2025</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-info d-none" id="table-header" data-toggle="modal" data-target="#addHostModal">
                                    <i class="fas fa-plus"></i> Tambah data absen
                                </button>   
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive tbl-striped" style="border: solid black 1px; max-height: 350px; overflow-x: auto;">
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr align="center">
                                            <th rowspan="2">Nama</th>
                                            <th  colspan="14">Maret</th>
                                            <th  colspan="16">April</th>
                                        </tr>
                                        <tr>
                                        @for ($i = 18; $i <= 31; $i++)
                                            <th>{{ $i }}</th>
                                        @endfor
                                        @for ($i = 1; $i <= 16; $i++)
                                            <th>{{ $i }}</th>
                                        @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tableData as $row)
                                        <tr>
                                            <td>{{ $row["nama"] }}</td>
                                             @foreach ($row["present"] as $data)
                                               @if($data == 1)
                                               <td class="bg-success">
                                                   
                                                   </td>
                                               
                                               @elseif($data == 2)
                                               <td class="bg-primary">
                                                   
                                                   </td>
                                               
                                               @elseif($data == 3)
                                               <td class="bg-danger">
                                                   
                                                   </td>
                                                   @else
                                                   <td>
                                                    {{ $data }}
                                                   </td>
                                                   @endif
                                                
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="card">
            <div class="card-header border-transparant">
            <h3 class="card-title">Data capaian target absen Host</h3>
            </div>
            <div class="row">
                @foreach ($dataTarget as $data)
                @if($data->total_durasi!=(6*26) AND $data->total_kerja + $data->total_alfa + $data->total_libur != 30)
                <div class="col-12 col-sm-6 col-md-6 mb-3">
                    <div class="card-body bg-dark" style="border-radius:10px">
                    <div class="progress-group">{{ $data->nm_panggilan }}
                        <span class="float-right"><b>{{ $data->total_durasi }}</b>/156 Jam | <b>{{$data->total_kerja}}</b> Hari kerja</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: {{ ($data->total_durasi / 156) * 100 }}%"></div>
                        </div>
                        <span class="float-left">{{$data->total_kerja}} hari hadir kerja, {{$data->total_alfa}} kali tidak hadir, dan {{$data->total_libur}} kali libur</span>
                    </div>
                    </div>
                </div>
                @endif
                @if($data->total_durasi==(6*26))
                <div class="col-12 col-sm-6 col-md-6 mb-3">
                    <div class="card-body bg-dark" style="border-radius:10px">
                    <div class="progress-group">{{ $data->nm_panggilan }}
                        <span class="float-right"><b>{{ $data->total_durasi }}</b>/156 Jam | <b>{{$data->total_kerja}}</b> Hari kerja</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: {{ ($data->total_durasi / 156) * 100 }}%"></div>
                        </div>
                        <span class="float-left">{{$data->nm_panggilan}} sudah memenuhi target durasi live, <a href="{{route('gaji.halamanBayar',$data->id_host)}}">Ketuk untuk melihat gaji !</a></span>
                    </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="card-footer"></div>
            </div>
        </div>
    </section>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.classList.remove('show');
                alert.classList.add('fade');
                alert.addEventListener('transitionend', () => {
                    alert.remove();
                });
            }, 5000);
        });
    });
</script>
