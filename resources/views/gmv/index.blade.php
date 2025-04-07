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
                        <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tabel data GMV</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="#" id="edit-gmv-btn">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1" id="edit-icon"><i class="fas fa-edit"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number" id="edit-text">Edit data GMV</span>
                            <span class="info-box-text" id="edit-text-kecil">Ketuk untuk mengedit</span>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <a type="button" id="tambahData" data-toggle="modal" data-target="#addGmvModal">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number">Tambah data GMV</span>
                            <span class="info-box-text">Ketuk untuk menambah Data</span>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Tabel data GMV harian</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-info d-none" id="table-header" data-toggle="modal" data-target="#addGmvModal">
                                    <i class="fas fa-plus"></i> Tambah data GMV
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th >Tanggal</th>
                                            <th>GMV</th>
                                            <th>Estimasi komisi (5%)</th>
                                            <th class="d-none" id="action-header">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($gmv as $data)
                                        <tr>
                                            <td>{{$data->tanggal}}</td>
                                            <td>Rp. {{ number_format($data->gmv, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($data->gmv*5/100, 0, ',', '.') }}</td>
                                            <td class="d-none action-column row">
                                            <form action="{{route('gmv.edit', $data->id_gmv)}}">
                                                <button type="submit" class="btn btn-info mr-2">Edit</button>
                                            </form>
                                            <form action="{{route('gmv.sekarang', $data->id_gmv)}}">
                                                <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                                            </form>
                                            <form method="POST" action="{{route('gmv.destroy', $data->id_gmv)}}" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data GMV ini ?');">Hapus</button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix"></div>
                        @include('gmv.add')
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.getElementById('edit-gmv-btn').addEventListener('click', function () {
    const actionHeader = document.getElementById('action-header');
    const tableHeader = document.getElementById('table-header');
    const actionColumns = document.querySelectorAll('.action-column');
    const editIcon = document.getElementById('edit-icon');
    const editText = document.getElementById('edit-text');
    const editTextKecil = document.getElementById('edit-text-kecil');
    const tambahData = document.getElementById('tambahData');

    if (actionHeader && actionColumns) {
        if (actionHeader.classList.contains('d-none')) {
            actionHeader.classList.remove('d-none');
            tableHeader.classList.remove('d-none');
            tambahData.classList.add('d-none');
            actionColumns.forEach(column => column.classList.remove('d-none'));
            editIcon.classList.replace('bg-success', 'bg-danger');
            editIcon.innerHTML = '<i class="fas fa-arrow-left"></i>';
            editText.textContent = 'Kembali';
            editTextKecil.textContent = 'Ketuk untuk membatalkan';
        } else {
            actionHeader.classList.add('d-none');
            tableHeader.classList.add('d-none');
            tambahData.classList.remove('d-none');
            actionColumns.forEach(column => column.classList.add('d-none'));
            editIcon.classList.replace('bg-danger', 'bg-success');
            editIcon.innerHTML = '<i class="fas fa-edit"></i>';
            editText.textContent = 'Edit data host';
            editTextKecil.textContent = 'Ketuk untuk mengedit';
        }
    }
});

</script>
@endsection
