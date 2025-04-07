<!-- File: add.blade.php -->
<div class="modal fade" id="addKomisiModal" tabindex="-1" role="dialog" aria-labelledby="addKomisiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKomisiModalLabel">Tambah komisi khusus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="komisi">Komisi tambahan</label>
                        <input type="number" min="1000" class="form-control" id="komisi" name="komisi" required>
                    </div>
                    <div class="form-group">
                        <label for="catatan">Durasi Live</label>
                        <input type="text" class="form-control" id="catatan" name="catatan" placeholder="*Kerjamu bagus !" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Tambah komisi</button>
                </div>
            </form>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
                    