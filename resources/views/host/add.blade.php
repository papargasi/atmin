<!-- resources/views/partials/add_host_modal.blade.php -->
<div class="modal fade" id="addHostModal" tabindex="-1" role="dialog" aria-labelledby="addHostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addHostModalLabel">Tambah Data Host Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('host.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nm_host">Nama Host</label>
                        <input type="text" name="nm_host" id="nm_host" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nm_panggilan">Nama Panggilan</label>
                        <input type="text" name="nm_panggilan" id="nm_panggilan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bank">Bank</label>
                        <select name="bank" id="bank" class="form-control" required>
                            <option hidden>Silahkan pilih jenis BANK</option>
                            <option value="DANA">Dana</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="norek">Nomor Rekening</label>
                        <input type="text" name="norek" id="norek" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nomor HP</label>
                        <input type="text" name="nohp" id="nohp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Host</label>
                        <input type="file" name="foto" id="foto" class="form-control-file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
