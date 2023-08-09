<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('templates') ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('templates/node_modules/@fortawesome/fontawesome-free/css/all.min.css') ?>">

    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="<?= base_url('templates') ?>/node_modules/jquery-selectric/selectric.css"> -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('templates/assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('templates/assets/css/components.css') ?>">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/img/logo-depan-y.png') ?>" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3>Registrasi</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <?= view('Myth\Auth\Views\_message_block') ?>

                                    <form action="<?= url_to('register') ?>" method="post">
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

                                        <br>

                                        <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                                    </form>


                                    <hr>

                                    <p>Sudah punya akun ? <a href="<?= url_to('login') ?>">Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; xyzr 2023
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('templates/node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('templates/node_modules/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?= base_url('templates') ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('templates') ?>/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('templates') ?>/node_modules/moment/min/moment.min.js"></script>
    <script src="<?= base_url('templates') ?>/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url('templates') ?>/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('templates') ?>/assets/js/page/auth-register.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('templates') ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('templates') ?>/assets/js/custom.js"></script>
</body>

</html>