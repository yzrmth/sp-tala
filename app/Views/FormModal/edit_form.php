<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-peta" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Deskripsi Peta</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-edit-peta" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" class="form-control" id="id_peta" name="id_peta" value="<?= $peta->id_peta ?>">
                    <div class="form-group ">
                        <label for="proyek">Nama Proyek</label>
                        <input type="text" class="form-control" id="proyek" name="proyek">
                        <div class="invalid-feedback error-proyek"></div>
                    </div>
                    <div class="form-group ">
                        <label for="nomor_peta">Nomor Peta</label>
                        <input type="text" class="form-control" id="nomor_peta" name="nomor_peta">
                        <div class="invalid-feedback error-nomor-peta"></div>
                    </div>
                    <div class="form-group ">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun">
                        <div class="invalid-feedback error-tahun"></div>
                    </div>
                    <div class="form-group ">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                        <div class="invalid-feedback error-kecamatan"></div>
                    </div>
                    <div class="form-group ">
                        <label for="desa">Desa</label>
                        <input type="text" class="form-control" id="desa" name="desa">
                        <div class="invalid-feedback error-desa"></div>
                    </div>
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