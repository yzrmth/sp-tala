<div class="modal fade" tabindex="-1" role="dialog" id="modal-pengguna-baru" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Dokumen</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-tambah-pengguna-baru" method="POST">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="nama"><?= lang('Nama Lengkap') ?></label>
                        <input type="text" class="form-control " id="nama" name="nama" placeholder="<?= lang('Nama Lengkap') ?>" value="<?= old('nama') ?>">
                        <div class="invalid-feedback error-nama"></div>
                    </div>

                    <div class="form-group">
                        <label for="nip"><?= lang('NIP') ?></label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="<?= lang('Nomor Induk Pegawai') ?>" value="<?= old('nip') ?>">
                        <div class="invalid-feedback error-nip"></div>

                    </div>

                    <div class="form-group">
                        <label for="jabatan"><?= lang('Jabatan') ?></label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="<?= lang('Jabatan') ?>" value="<?= old('jabatan') ?>">
                        <div class="invalid-feedback error-jabatan"></div>

                    </div>

                    <div class="form-group">
                        <label for="email"><?= lang('Auth.email') ?></label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                        <div class="invalid-feedback error-email"></div>

                    </div>

                    <div class="form-group">
                        <label for="username"><?= lang('Auth.username') ?></label>
                        <input type="text" class="form-control " id="username" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                        <div class="invalid-feedback error-username"></div>

                    </div>

                    <div class=" form-group ">
                        <label class="col-sm-3 col-form-label" for="role">Profil</label>

                        <select class="form-control" id="role" name="role">
                            <option value="">--Pilih Profil--</option>
                        </select>
                        <div class="invalid-feedback error-role"></div>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>