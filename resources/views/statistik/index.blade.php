@extends('layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pusat Statistik</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pusat Statistik</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Capaian GMV</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <canvas id="gmvChart" style="width:100%; height:250px;"></canvas>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12 col-6 text-center description-block ">
                                    <h5 class="description-header">Total GMV : Rp {{number_format($totalGmv,0,",",",")}}</h5>
                                </div>
                                <div class="col-md-6 col-6">
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
                                <div class="col-md-6 col-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-success">
                                            
                                            {{ round(($gmvMingguKedua / ($totalGmv ?: 1)) * 100, 2) }}%
                                        </span>
                                        <h5 class="description-header">
                                            Rp {{ number_format($gmvMingguKedua, 0, ',', '.') }}
                                        </h5>
                                        <span class="description-text">Minggu ke-2</span>
                                    </div>
                                </div>    
                                <div class="col-md-6 col-6">
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
                                <div class="col-md-6 col-6">
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
                <div class="card-footer"></div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Capaian Komisi</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <canvas id="komisiChart" style="width:100%; height:250px;"></canvas>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12 col-6 text-center description-block ">
                                    <h5 class="description-header">Total Komisi : Rp {{number_format((($totalGmv*5)/100),0,",",",")}}</h5>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success">
                                            
                                            {{ round(($gmvMingguPertama / ($totalGmv ?: 1)) * 100, 2) }}%
                                        </span>
                                        <h5 class="description-header">
                                            Rp {{ number_format(($gmvMingguPertama*5)/100, 0, ',', '.') }}
                                        </h5>
                                        <span class="description-text">Minggu ke-1</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-success">
                                            
                                            {{ round(($gmvMingguKedua / ($totalGmv ?: 1)) * 100, 2) }}%
                                        </span>
                                        <h5 class="description-header">
                                            Rp {{ number_format(($gmvMingguKedua*5)/100, 0, ',', '.') }}
                                        </h5>
                                        <span class="description-text">Minggu ke-2</span>
                                    </div>
                                </div>    
                                <div class="col-md-6 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success">
                                            
                                            {{ round(($gmvMingguKetiga / ($totalGmv ?: 1)) * 100, 2) }}%
                                        </span>
                                        <h5 class="description-header">
                                            Rp {{ number_format(($gmvMingguKetiga*5)/100, 0, ',', '.') }}
                                        </h5>
                                        <span class="description-text">Minggu ke-3</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-success">
                                            
                                            {{ round(($gmvMingguKeempat / ($totalGmv ?: 1)) * 100, 2) }}%
                                        </span>
                                        <h5 class="description-header">
                                            Rp {{ number_format(($gmvMingguKeempat*5)/100, 0, ',', '.') }}
                                        </h5>
                                        <span class="description-text">Minggu ke-4</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Rekap kehadiran</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <canvas id="absenChart" height="180"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Capaian target durasi live</h3>
                        </div>
                        <div class="card-body">
                        @foreach ($dataAbsen as $data)
                        <div class="progress-group mb-3">{{ $data->nm_panggilan }}
                            <span class="float-right"><b>{{ $data->total_durasi }}</b>/130 Jam | <b>{{ $data->total_kerja }}</b> hari kerja</span>
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
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById("gmvChart").getContext("2d");
        var ktx = document.getElementById("komisiChart").getContext("2d"); 
        var btx = document.getElementById('absenChart').getContext('2d');

        // Data dari PHP ke JavaScript (gunakan blade untuk memasukkan data)
        var gmvHarian = @json($gmvHarian);
        var komisiHarian = @json($komisiHarian);
        var dataAbsen = @json($capaianAbsen);

        var labels = dataAbsen.map(item => item.nm_panggilan);
        var dataValues = dataAbsen.map(item => item.total_kerja);

        // Buat gradient untuk efek gunung
        var gradient = ctx.createLinearGradient(0, 0, 0, 250);
        gradient.addColorStop(0, "rgba(75, 192, 192, 0.5)");
        gradient.addColorStop(1, "rgba(255, 255, 255, 0)");

        var gradient = ktx.createLinearGradient(0, 0, 0, 250);
        gradient.addColorStop(0, "rgba(75, 192, 192, 0.5)");
        gradient.addColorStop(1, "rgba(255, 255, 255, 0)");

        var gradient = btx.createLinearGradient(0, 0, 0, 250);
        gradient.addColorStop(0, "rgba(75, 192, 192, 0.5)");
        gradient.addColorStop(1, "rgba(255, 255, 255, 0)");
        
        var gmvChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [...Array(gmvHarian.length).keys()].map(i => "Hari " + (i + 1)),
                datasets: [{
                    label: "GMV Harian",
                    data: gmvHarian,
                    borderColor: "#4bc0c0",
                    borderWidth: 2,
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 3,
                    pointBackgroundColor: "#4bc0c0"
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    x: {
                        grid: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: "rgba(200, 200, 200, 0.2)" }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
        var komisiChart = new Chart(ktx, {
            type: "bar",
            data: {
                labels: [...Array(komisiHarian.length).keys()].map(i => "Hari " + (i + 1)),
                datasets: [{
                    label: "komisi Harian",
                    data: komisiHarian,
                    borderColor: "#4bc0c0",
                    borderWidth: 2,
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 3,
                    pointBackgroundColor: "#4bc0c0"
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    x: {
                        grid: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: "rgba(200, 200, 200, 0.2)" }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
        var pieChart = new Chart(btx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Hari Kerja',
                    data: dataValues,
                    borderColor: '#4bc0c0',
                    borderWidth:2,
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 3,
                    pointBackgroundColor: "#4bc0c0"
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });
    });
</script>
@endsection
