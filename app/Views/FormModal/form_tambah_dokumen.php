<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah-dokumen" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Dokumen</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-tambah-dokumen" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="text" class="form-control" id="id_dokumen" name="id_dokumen" value="">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="JenisDokumen">Jenis Dokumen</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="JenisDokumen" name="fk_jenis_dokumen">
                                <option value="">--Pilih Jenis Dokumen--</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="showModalJenisDokumen()"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class=" form-group ">
                        <label for=" nama_dokumen">Nama Dokumen</label>
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen">
                        <div class="invalid-feedback error-nama-dokumen"></div>
                    </div>
                    <div class=" form-group ">
                        <label for=" keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="100" rows="100"></textarea>
                        <div class="invalid-feedback error-keterangan"></div>
                    </div>
                    <div class="form-group ">
                        <label for=" file_dokumen">Lampiran</label>
                        <input type="file" class="form-control" id="file_dokumen" name="file_dokumen">
                        <div class="invalid-feedback error-file-dokumen"></div>
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