@extends('layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Beranda</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-4">
                    <a href="{{route('gmv.index')}}">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1" id="edit-icon"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text" id="edit-text">GMV total</span>
                            <span class="info-box-number" id="edit-text-kecil">Rp. {{ number_format($totalGmv, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <a href="{{route('host.index')}}">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Host aktif</span>
                            <span class="info-box-number">{{ count($dataAbsen) }} host</span>
                        </div>
                    </div>
                    </a>
                </div>
                
                <div class="col-12 col-sm-6 col-md-4">
                    <a href="{{route('absen.index')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Absensi</span>
                            <span class="info-box-number">
                            Ketuk untuk Melihat
                            <small>></small>
                            </span>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Rekap performa bulanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>GMV Live Periode: 10 Jan - 8 Feb, 2025</strong>
                                    </p>
                                    <div class="chart">
                                        <canvas id="chartGMV" height="180" style="height: 180px;"></canvas>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center">
                                            <strong>Capaian target durasi live</strong>
                                        </p>
                                        @foreach ($dataAbsen as $data)
                                        <div class="progress-group">{{ $data->nm_panggilan }}
                                            <span class="float-right"><b>{{ $data->total_durasi }}</b>/130 Jam</span>
                                            <div class="progress progress-sm">
                                                @if($data->total_durasi == 130)
                                                <div class="progress-bar bg-success" style="width: {{ ($data->total_durasi / 130) * 100 }}%"></div>
                                                @else
                                                <div class="progress-bar bg-primary" style="width: {{ ($data->total_durasi / 130) * 100 }}%"></div>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <!-- Minggu ke-1 -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success">
                                                
                                                {{ round(($gmvMingguPertama / ($totalGmv ?: 1)) * 100, 2) }}%
                                            </span>
                                            <h5 class="description-header">
                                                Rp {{ number_format($gmvMingguPertama, 0, ',', '.') }}
                                            </h5>
                                            <span class="description-text">Minggu ke-1</span>
                                        </div>
                                    </div>

                                    <!-- Minggu ke-2 -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success">
                                                
                                                {{ round(($gmvMingguKedua / ($totalGmv ?: 1)) * 100, 2) }}%
                                            </span>
                                            <h5 class="description-header">
                                                Rp {{ number_format($gmvMingguKedua, 0, ',', '.') }}
                                            </h5>
                                            <span class="description-text">Minggu ke-2</span>
                                        </div>
                                    </div>

                                    <!-- Minggu ke-3 -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success">
                                                
                                                {{ round(($gmvMingguKetiga / ($totalGmv ?: 1)) * 100, 2) }}%
                                            </span>
                                            <h5 class="description-header">
                                                Rp {{ number_format($gmvMingguKetiga, 0, ',', '.') }}
                                            </h5>
                                            <span class="description-text">Minggu ke-3</span>
                                        </div>
                                    </div>

                                    <!-- Minggu ke-4 -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block">
                                            <span class="description-percentage text-success">
                                                
                                                {{ round(($gmvMingguKeempat / ($totalGmv ?: 1)) * 100, 2) }}%
                                            </span>
                                            <h5 class="description-header">
                                                Rp {{ number_format($gmvMingguKeempat, 0, ',', '.') }}
                                            </h5>
                                            <span class="description-text">Minggu ke-4</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Data GMV 7 hari terakhir</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>GMV</th>
                                                <th>Estimasi Komisi 5%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($gmvSeminggu as $dataG)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($dataG->tanggal)->format('D, d M Y') }}</td>
                                                <td>Rp. {{ number_format($dataG->gmv, 0, ',', '.') }}</td>
                                                <td>Rp. {{ number_format($dataG->gmv * 5 / 100, 2, ',', '.') }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <a href="{{route('gmv.index')}}" class="btn btn-sm btn-secondary float-right">Lihat semua GMV</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Host aktif</h3>
                                <div class="card-tools">
                                <span class="badge badge-danger">{{ count($dataAbsen) }} Host aktif</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="users-list clearfix">
                                @foreach ($dataAbsen as $data)
                                    <li>
                                        <img src="{{ asset('img/host/'.$data->foto.'') }}" style="height:75px;width:75px;border-radius:50%;object-fit:cover;cursor:pointer;" alt="kosong">
                                        <a class="users-list-name" href="{{route('host.index')}}">{{ $data->nm_panggilan }}</a>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('host.index')}}" class="btn btn-sm btn-secondary float-right">Lihat semua host</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="chart">
    <canvas id="chartGMV" height="180" style="height: 180px;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var allDates = [];
        for (var i = 0; i < 30; i++) {
            var date = new Date(2025, 0, 10 + i);
            allDates.push(date.toLocaleDateString('id-ID'));
        }

        var gmvData = @json($chartGmv->pluck('gmv'));
        var dates = @json($chartGmv->pluck('tanggal'));

        var formattedGmvData = allDates.map(function(date) {
            var index = dates.indexOf(date);
            if (index !== -1) {
                return gmvData[index];
            }
            return 0;
        });
        var ctx = document.getElementById('chartGMV').getContext('2d');
        var gradient = ctx.createLinearGradient(0, 0, 0, 250);
        gradient.addColorStop(0, "rgba(75, 192, 192, 0.5)");
        gradient.addColorStop(1, "rgba(255, 255, 255, 0)");

        var chartGMV = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'GMV',
                    data: gmvData,
                    borderColor: '#4bc0c0',
                    borderWidth:2,
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 3,
                    pointBackgroundColor: '#4e73df',
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 500000,
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString();
                            }
                        }
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Rp ' + tooltipItem.raw.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    </script>


@endsection