<?= $this->extend('_layouts/indexLayout') ?>

<?= $this->section('content') ?>
<div class="section-header">
    <h1>Register Pengguna Baru</h1>
</div>
<div class="section-body">
    <div class="card card-primary">
        <div class="card-header">
        </div>
        <div class="card-body">
            <?= view('Myth\Auth\Views\_message_block') ?>
            <form action="<?= url_to('register') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="nama"><?= lang('Nama Lengkap') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" name="nama" placeholder="<?= lang('Nama Lengkap') ?>" value="<?= old('nama') ?>">
                </div>

                <div class="form-group">
                    <label for="nip"><?= lang('NIP') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.nip')) : ?>is-invalid<?php endif ?>" name="nip" placeholder="<?= lang('Nomor Induk Pegawai') ?>" value="<?= old('nip') ?>">
                </div>

                <div class="form-group">
                    <label for="jabatan"><?= lang('Jabatan') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.jabatan')) : ?>is-invalid<?php endif ?>" name="jabatan" placeholder="<?= lang('Jabatan') ?>" value="<?= old('jabatan') ?>">
                </div>

                <div class="form-group">
                    <label for="email"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                    <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                </div>

                <div class="form-group">
                    <label for="username"><?= lang('Auth.username') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                </div>

                <div class="form-group">
                    <label for="password"><?= lang('Auth.password') ?></label>
                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                    <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>