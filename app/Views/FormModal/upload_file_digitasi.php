<div class="modal fade" tabindex="-1" role="dialog" id="modal-upload-file-digitasi" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Digitasi</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-upload-file-digitasi" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" class="form-control" id="id_peta" name="id_peta" value="<?= $peta->id_peta ?>">
                    <input type="hidden" class="form-control" id="nama_file" name="nama_file" value="<?= $peta->file_scan ?>">
                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= user_id() ?>">

                    <div class="form-group">
                        <label>Default Select</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Sudah Terdudukan">Sudah Terdudukan</option>
                            <option value="Belum Terdudukan">Belum Terdudukan</option>
                        </select>
                        <div class="invalid-feedback error-status"></div>
                    </div>
                    <div class="form-group ">
                        <input type="file" class="form-control" id="file-digitasi" name="file_digitasi">
                        <div class="invalid-feedback error-file-digitasi"></div>
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