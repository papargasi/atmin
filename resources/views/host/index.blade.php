@extends('layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data HOST</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tabel data host</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <a href="#" id="edit-host-btn">
                <div class="info-box col-12 col-sm-6 col-md-3">
                    <span class="info-box-icon bg-success elevation-1" id="edit-icon"><i class="fas fa-edit"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-number" id="edit-text">Edit data host</span>
                        <span class="info-box-text" id="edit-text-kecil">
                            Ketuk untuk mengedit
                        </span>
                    </div>
                </div>
            </a>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel data HOST aktif</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-info d-none" id="table-header" data-toggle="modal" data-target="#addHostModal">
                                    <i class="fas fa-plus"></i> Tambah data host
                                </button>
                                @include('host.add')
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th >Nama</th>
                                            <th>Status</th>
                                            <th>Alamat</th>
                                            <th>Perbangkan</th>
                                            <th>Kontak</th>
                                            <th class="d-none" id="action-header">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataHost as $data)
                                        <tr>
                                            <td width="90px">
                                                <img src="{{ asset('img/host/'.$data->foto.'') }}" 
                                                     alt="foto kosong" 
                                                     style="height:75px;width:75px;border-radius:50%;object-fit:cover;cursor:pointer;" 
                                                     onclick="openModal()">
                                            </td>
                                            <td>{{$data->nm_host}} ({{$data->nm_panggilan}})</td>
                                            @if($data->status == 'Admin')
                                            <td><div class="bg-primary text-center" style="border-radius:15px">{{$data->status}}</div></td>
                                            @elseif($data->status == 'Training')
                                            <td><div class="bg-warning text-center" style="border-radius:15px">{{$data->status}}</div></td>
                                            @elseif($data->status == 'Karyawan')
                                            <td><div class="bg-success text-center" style="border-radius:15px">{{$data->status}}</div></td>
                                            @endif
                                            <td>{{$data->alamat}}</td>
                                            <td>{{$data->bank}} ({{$data->norek}})</td>
                                            <td>{{$data->nohp}}</td>
                                            <td class="d-none action-column">
                                            <form method="GET" action="{{ route('host.edit', $data->id_host) }}" style="display:inline;">
                                                <button type="submit" class="btn btn-success btn-sm">Edit</button>
                                            </form>
                                            <form method="POST" action="{{ route('host.destroy', $data->id_host) }}" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data HOST ini ?');"
                                                >Hapus</button>
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
            </div>
        </div>
    </section>
</div>
<div id="imageModal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
        <img id="modalImage" src="" alt="Gambar" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('edit-host-btn').addEventListener('click', function () {
    // Toggle the "Aksi" column
    const actionHeader = document.getElementById('action-header');
    const tableHeader = document.getElementById('table-header');
    const actionColumns = document.querySelectorAll('.action-column');
    const editIcon = document.getElementById('edit-icon');
    const editText = document.getElementById('edit-text');
    const editTextKecil = document.getElementById('edit-text-kecil');

    if (actionHeader && actionColumns) {
        if (actionHeader.classList.contains('d-none')) {
            actionHeader.classList.remove('d-none');
            tableHeader.classList.remove('d-none');
            actionColumns.forEach(column => column.classList.remove('d-none'));
            editIcon.classList.replace('bg-success', 'bg-danger');
            editIcon.innerHTML = '<i class="fas fa-arrow-left"></i>';
            editText.textContent = 'Kembali';
            editTextKecil.textContent = 'Ketuk untuk membatalkan';
        } else {
            actionHeader.classList.add('d-none');
            tableHeader.classList.add('d-none');
            actionColumns.forEach(column => column.classList.add('d-none'));
            editIcon.classList.replace('bg-danger', 'bg-success');
            editIcon.innerHTML = '<i class="fas fa-edit"></i>';
            editText.textContent = 'Edit data host';
            editTextKecil.textContent = 'Ketuk untuk mengedit';
        }
    }
});

function openModal() {
    var modal = document.getElementById('imageModal');
    var img = event.target;
    var modalImg = document.getElementById('modalImage');
    
    modalImg.src = img.src.replace('75x75', 'original');
    modal.classList.add('show');
}

function closeModal() {
    var modal = document.getElementById('imageModal');
    modal.classList.remove('show');
}

window.onclick = function(event) {
    var modal = document.getElementById('imageModal');
    if (event.target == modal) {
        modal.classList.remove('show');
    }
}

// Menangani tombol edit

</script>
@endsection
