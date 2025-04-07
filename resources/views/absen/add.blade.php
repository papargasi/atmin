<!-- File: add.blade.php -->
<div class="modal fade" id="addAbsenModal" tabindex="-1" role="dialog" aria-labelledby="addAbsenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAbsenModalLabel">Buat Data absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('Absen.addHadir')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="gmv">Durasi Live</label>
                        <input type="number" class="form-control" id="gmv" min=1 name="gmv" placeholder="Cukup tulis angka saja" required>
                    </div>
                    <div class="form-group">
                        <label for="nm_host">Nama host</label>
                        <select type="number" class="form-control" id="nm_host" name="nm_host" required>
                            <option hidden>Pilih host</option>
                            @foreach ($dataTarget as $data)
                            @if($data->total_durasi != 156 AND $data->total_kerja + $data->total_alfa + $data->total_libur != 30)
                            <option value="{{$data->id_host}}">{{$data->nm_panggilan}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
            <div class="modal-body">
                <h6 class="w-100 text-center mb-2">Tombol cepat libur</h6>
                <div class="row w-100">
                    @foreach ($dataTarget as $data)
                    @if($data->total_durasi != 156 AND $data->total_kerja + $data->total_alfa + $data->total_libur != 30 AND $data->total_libur != 4)
                    <div class="col-6 mb-2">
                        <form action="{{route('Absen.addLibur')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id_host}}" >
                            <input type="hidden" name="durasi" value="0" >
                            <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin {{$data->nm_panggilan}} libur hari ini ?')">{{$data->nm_panggilan}}</button>
                        </form>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <h6 class="w-100 text-center mb-2">Tombol cepat tidak hadir</h6>
                <div class="row w-100">
                    @foreach ($dataTarget as $data)
                    @if($data->total_durasi != 156 AND $data->total_kerja + $data->total_alfa + $data->total_libur != 30)
                    <div class="col-6 mb-2">
                        <form action="{{route('Absen.addAlfa')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id_host}}" >
                            <input type="hidden" name="durasi" value="0" >
                            <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Apakah anda yakin {{$data->nm_panggilan}} tidak hadir hari ini ?')">{{$data->nm_panggilan}}</button>
                        </form>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
