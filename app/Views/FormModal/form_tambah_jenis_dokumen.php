<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah-jenis-dokumen" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Scan Peta</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-tambah-jenis-dokumen" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" class="form-control" id="id_jenis_dokumen" name="id_jenis_dokumen" value="">
                    <div class=" form-group ">
                        <label for="jenis_dokumen">Nama Jenis Dokumen</label>
                        <input type="text" class="form-control" id="jenis_dokumen" name="jenis_dokumen">
                        <div class="invalid-feedback error-jenis-dokumen"></div>
                    </div>
                    <div class=" form-group ">
                        <label for=" keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                        <div class="invalid-feedback error-keterangan"></div>
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