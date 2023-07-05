<div class="modal fade" tabindex="-1" role="dialog" id="modal-upload-file-scan" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Deskripsi Peta</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-upload-file-scan" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" class="form-control" id="id_peta" name="id_peta" value="<?= $peta->id_peta ?>">
                    <input type="hidden" class="form-control" id="nama_file" name="nama_file" value="<?= $peta->file_scan ?>">
                    <div class="form-group ">
                        <input type="file" class="form-control" id="file_scan" name="file_scan">
                        <div class="invalid-feedback error-file-scan"></div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>