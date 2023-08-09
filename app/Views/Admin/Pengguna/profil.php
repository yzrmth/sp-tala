<form action="" id="form-edit-pengguna" method="POST">
    <input type="hidden" id="user_id" name="user_id" value="<?= $dataUser->user_id ?>">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="nama"><?= lang('Nama Lengkap') ?></label>
        <input type="text" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" name="nama" placeholder="<?= lang('Nama Lengkap') ?>" value="<?= $dataUser->nama ?>">
    </div>

    <div class="form-group">
        <label for="nip"><?= lang('NIP') ?></label>
        <input type="text" class="form-control <?php if (session('errors.nip')) : ?>is-invalid<?php endif ?>" name="nip" placeholder="<?= lang('Nomor Induk Pegawai') ?>" value="<?= $dataUser->nip ?>">
    </div>

    <div class="form-group">
        <label for="jabatan"><?= lang('Jabatan') ?></label>
        <input type="text" class="form-control <?php if (session('errors.jabatan')) : ?>is-invalid<?php endif ?>" name="jabatan" placeholder="<?= lang('Jabatan') ?>" value="<?= $dataUser->jabatan ?>">
    </div>

    <div class="form-group">
        <label for="email"><?= lang('Auth.email') ?></label>
        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= $dataUser->email ?>">
        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
    </div>

    <div class="form-group">
        <label for="username"><?= lang('Auth.username') ?></label>
        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= $dataUser->username ?>">
    </div>

    <div class=" form-group ">
        <label class="col-sm-3 col-form-label" for="role">Profil</label>

        <select class="form-control" id="role" name="role">
            <?php
            foreach ($role as $role => $value) { ?>
                <option value="<?= $value->id ?>" <?php if ($dataUser->name == $value->name) {
                                                        echo ' selected="selected"';
                                                    } ?>><?= $value->name ?></option>
                }
            <?php } ?>
        </select>

        <div class="invalid-feedback error-role"></div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>