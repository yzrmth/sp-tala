<?= $this->extend('_layouts/indexLayout') ?>

<?= $this->section('content') ?>
<div class="section-header">
    <h1><?= $title ?></h1>
</div>

<div class="section-body">
    <a href="<?= site_url('akun') ?>" class="btn btn-icon icon-left btn-danger mb-3"><i class="ion-reply"></i> Kembali</a>
    <h2 class="section-title">Hi, <?= $dataUser->nama ?></h2>
    <div class="row">
        <div class="col-md-4 ">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="<?= site_url('templates/') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <?php if ($dataUser->active == 1) {
                        echo '<div class="badge badge-pill badge-success m-2 float-right">Aktif</div>';
                    } else {
                        echo '<div class="badge badge-pill badge-danger m-2 float-right">Tidak Aktif</div>';
                    }
                    ?>
                </div>
                <?php if ($dataUser->active == 1) {
                    echo '<button onclick="NonAktif(' . $dataUser->user_id . ')" class="btn btn-outline-danger"><i class="fas fa-power-off mr-2"></i>Nonaktifkan Akun</button>';
                } else {
                    echo '<button onclick="AktifAkun(' . $dataUser->user_id . ')" class="btn btn-outline-success"><i class="fas fa-power-off mr-2"></i>Aktifkan Akun</button>';
                }
                ?>

                <div class="profile-widget-description pb-0">
                    <div class="profile-widget-name  "><?= $dataUser->nama ?><div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> <?= $dataUser->jabatan ?>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-name">

                </div>


                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="profil-tab4" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true"><i class="far fa-user mr-2"></i>Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="akses-tab4" data-toggle="tab" href="#akses" role="tab" aria-controls="akses" aria-selected="false"><i class="fas fa-cog mr-2"></i>Pengaturan Akses</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <!-- konten profil -->
            <div class="tab-content no-padding" id="myTab2Content">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab4">
                                <div class="text-center mb-2">
                                    <button class="btn btn-icon btn-warning btn-edit" onclick="EditProfil(<?= user_id() ?>)" style="display: ;"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-icon btn-danger btn-batal" onclick="Batal()" style="display: none;"><i class="fas fa-times"></i></button>
                                </div>
                                <form action="" id="form-edit-pengguna" method="POST">
                                    <input type="hidden" id="user_id" name="user_id" value="<?= $dataUser->user_id ?>">
                                    <?= csrf_field() ?>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="nama"><?= lang('Nama Lengkap') ?></label>
                                            <input type="text" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" name="nama" placeholder="<?= lang('Nama Lengkap') ?>" value="<?= $dataUser->nama ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="nip"><?= lang('NIP') ?></label>
                                            <input type="text" class="form-control <?php if (session('errors.nip')) : ?>is-invalid<?php endif ?>" name="nip" placeholder="<?= lang('Nomor Induk Pegawai') ?>" value="<?= $dataUser->nip ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="jabatan"><?= lang('Jabatan') ?></label>
                                            <input type="text" class="form-control <?php if (session('errors.jabatan')) : ?>is-invalid<?php endif ?>" name="jabatan" placeholder="<?= lang('Jabatan') ?>" value="<?= $dataUser->jabatan ?>" disabled>
                                        </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label for="email"><?= lang('Auth.email') ?></label>
                                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= $dataUser->email ?>" disabled>
                                            <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="username"><?= lang('Auth.username') ?></label>
                                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= $dataUser->username ?>" disabled>
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-simpan" style="display: none;">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane show" id="akses" role="tabpanel" aria-labelledby="akses-tab4">
                                <div class="row">
                                    <button class="btn btn-icon btn-primary mb-2" data-toggle="modal" data-target="#tambah-akses"><i class="fas fa-plus mr-2"></i>Tambah Hak Akses</button>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($groups_user as $value) : ?>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col"><?= $value['name'] ?></th>
                                                <th scope="col"><?= $value['description'] ?></th>
                                                <th scope="col">
                                                    <button class="btn btn-icon btn-danger btn-batal" onclick="Hapus(<?= $value['user_id'] ?>,<?= $value['group_id'] ?>)"><i class="fas fa-trash"></i></button>
                                                </th>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<div class="modal fade" tabindex="-1" role="dialog" id="tambah-akses" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Hak Akses</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-tambah-akses" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $dataUser->user_id ?>">
                    <div class=" form-group ">
                        <label>Pilih Hak Akses</label>
                        <select class="form-control" id="group_id" name="group_id">
                            <?php
                            foreach ($role as $role) : ?>
                                <option value="<?= $role->id ?>" <?php if ($dataUser->name == $role->name) {
                                                                        echo ' selected="selected"';
                                                                    } ?>><?= $role->name ?></option>
                                }
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback error-role"></div>
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
<?= $this->endSection() ?>

<?= $this->section('page-script') ?>
<script>
    var id = $('#user_id').val();

    // Edit Profil Pengguna
    function EditProfil(id) {
        $('input').removeAttr('disabled')
        $('select').removeAttr('disabled')
        $('.btn-batal').show()
        $('.btn-simpan').show()
        $('.btn-simpan').show()
        $('.btn-btn-edit').hide()
    }

    function Batal() {
        $('input').prop('disabled', true)
        $('select').prop('disabled', true)
        $('.btn-batal').hide()
        $('.btn-simpan').hide()
    }

    // function nonaktifkan akun
    function NonAktif(user_id) {
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menonaktifkan akun.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('nonaktif-akun/' . $dataUser->user_id) ?>",
                        data: jQuery.param({
                            user_id: user_id,
                            active: 0
                        }),
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        beforeSend: function() {
                            document.querySelector('.loading').style.display = 'block';
                        },
                        complete: function() {
                            document.querySelector('.loading').style.display = 'none';
                        },
                        success: function(response) {
                            swal('Berhasil', 'Data berhasil diubah.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.reload(true);
                                });
                        },
                        error: function(response) {
                            alert('gagal')
                        }
                    });
                } else {

                }
            });
    }
    // function aktifkan akun
    function AktifAkun(user_id) {
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menonaktifkan akun.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('aktif-akun/' . $dataUser->user_id) ?>",
                        data: jQuery.param({
                            user_id: user_id,
                            active: 1
                        }),
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        beforeSend: function() {
                            document.querySelector('.loading').style.display = 'block';
                        },
                        complete: function() {
                            document.querySelector('.loading').style.display = 'none';
                        },
                        success: function(response) {
                            swal('Berhasil', 'Data berhasil diubah.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.reload(true);
                                });
                        },
                        error: function(response) {
                            alert('gagal')
                        }
                    });
                } else {

                }
            });
    }

    // function menghapus hak akses dari user
    function Hapus(user_id, group_id) {
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan mengubah profil pengguna.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('hapus-akses/' . $dataUser->user_id . '/' . $dataUser->group_id) ?>",
                        data: jQuery.param({
                            user_id: user_id,
                            group_id: group_id
                        }),
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        beforeSend: function() {
                            document.querySelector('.loading').style.display = 'block';
                        },
                        complete: function() {
                            document.querySelector('.loading').style.display = 'none';
                        },
                        success: function(response) {
                            swal('Berhasil', 'Data berhasil diubah.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.reload(true);
                                });
                        },
                        error: function(response) {
                            alert('gagal')
                        }
                    });
                } else {

                }
            });
    }

    // ajax tambah pengguna
    $(document).on("submit", "#form-edit-pengguna", function(e) {
        e.preventDefault();
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan mengubah profil pengguna.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('update-profil-akun/' . $dataUser->user_id) ?>",
                        data: new FormData(this),
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        beforeSend: function() {
                            document.querySelector('.loading').style.display = 'block';
                        },
                        complete: function() {
                            document.querySelector('.loading').style.display = 'none';
                        },
                        success: function(response) {
                            swal('Berhasil', 'Data berhasil diubah.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.reload(true);
                                });
                        },
                        error: function(response) {
                            alert('gagal')
                        }
                    });
                } else {

                }
            });
    });

    // ajax tambah hak akses
    $(document).on("submit", "#form-tambah-akses", function(e) {
        e.preventDefault();
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan mengubah profil pengguna.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('tambah-akses') ?>",
                        data: new FormData(this),
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        beforeSend: function() {
                            document.querySelector('.loading').style.display = 'block';
                        },
                        complete: function() {
                            document.querySelector('.loading').style.display = 'none';
                        },
                        success: function(response) {
                            swal('Berhasil', 'Data berhasil diubah.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.reload(true);
                                    // console.log(response)
                                });
                        },
                        error: function(response) {
                            alert('gagal')
                        }
                    });
                } else {

                }
            });
    });
</script>
<?= $this->endSection() ?>