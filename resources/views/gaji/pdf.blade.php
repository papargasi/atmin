<?php
$gajiTotalAdmin = 2600000;
$gajiTotalKaryawan = 2500000;
$gajiTotalTraining = 2500000;
$adminPerjam = ($gajiTotalAdmin / 26) / 6;
$karyawanPerjam = ($gajiTotalKaryawan / 26) / 6;
$trainingPerjam = ($gajiTotalTraining / 26) / 6;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Gaji</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .text-center { text-align: center; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid black; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 class="text-center">KWITANSI GAJI</h2>
    <h4 class="text-center">{{ $host->nm_host }}</h4>
    <table>
        <tr><td>Nama</td><td>: {{ $host->nm_host }}</td></tr>
        <tr><td>Alamat</td><td>: {{ $host->alamat }}</td></tr>
        <tr><td>Perbankan</td><td>: {{ $host->bank }}</td></tr>
        <tr><td>No. Rekening</td><td>: {{ $host->norek }}</td></tr>
    </table>
    <table class="table">
        <tr>
            <th>Total Hari Kerja</th>
            <th>Total Durasi</th>
            <th>Gaji Per Jam</th>
            <th>Subtotal</th>
            <th>Komisi</th>
            <th>Total Gaji</th>
        </tr>
        <tr>
            <td>{{ $dataGaji->total_kerja }} hari</td>
            <td>{{ $dataGaji->total_durasi }} Jam</td>
            @if($dataGaji->status == 'Admin')
            <td>Rp {{ number_format($adminPerjam, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($dataGaji->total_durasi*$adminPerjam, 0, ',', '.') }}</td>
            <td>Rp 0</td>
            <td>Rp {{ number_format($dataGaji->total_durasi*$adminPerjam, 0, ',', '.') }}</td>
            @endif
            @if($dataGaji->status == 'Karyawan')
            <td>Rp {{ number_format($karyawanPerjam, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($dataGaji->total_durasi*$karyawanPerjam, 0, ',', '.') }}</td>
            <td>Rp 0</td>
            <td>Rp {{ number_format($dataGaji->total_durasi*$karyawanPerjam, 0, ',', '.') }}</td>
            @endif
            @if($dataGaji->status == 'Training')
            <td>Rp {{ number_format($trainingPerjam, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($dataGaji->total_durasi*$trainingPerjam, 0, ',', '.') }}</td>
            <td>Rp 0</td>
            <td>Rp {{ number_format($dataGaji->total_durasi*$trainingPerjam, 0, ',', '.') }}</td>
            @endif
        </tr>
    </table>
    <p class="text-center"><b>Terima kasih atas kerja keras Anda!</b></p>
</body>
</html>
