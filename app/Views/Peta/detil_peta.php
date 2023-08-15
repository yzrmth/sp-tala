<?= $this->extend('_layouts/indexLayout') ?>

<?= $this->section('page-css') ?>

<link rel="stylesheet" href="<?= base_url('assets/simple-lightbox/simple-lightbox.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="section-header">
    <h1><?= $title ?></h1>
</div>

<div class="section-body">
    <a href="<?= site_url('penyimpanan-peta') ?>" class="btn btn-icon icon-left btn-danger mb-3"><i class="ion-reply"></i> Kembali</a>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-primary">
                <!-- <div class="card-header">
                    <h4></h4>
                    <div class="card-header-action">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                            <div class="dropdown-menu">
                                <a href="" data-toggle="modal" data-target="#modal-edit-peta" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="detil-tab" data-toggle="tab" href="#detil" role="tab" aria-controls="home" aria-selected="true">Detil Peta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Riwayat</a>
                        </li>
                    </ul>
                    <!-- Tab Detil -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="detil" role="tabpanel" aria-labelledby="detil-tab">
                            <div class="row">
                                <div class="card-header">
                                    <h4></h4>
                                    <div class="card-header-action">
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                            <div class="dropdown-menu">
                                                <a href="" data-toggle="modal" data-target="#modal-edit-peta" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                <div class="dropdown-divider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <dl class="row">
                                <dt class="col-sm-4">Proyek</dt>
                                <dd class="col-sm-8"><?= $peta->proyek ?></dd>
                                <dt class="col-sm-4">Nomor Peta</dt>
                                <dd class="col-sm-8"><?= $peta->nomor_peta ?></dd>
                                <dt class="col-sm-4">Tahun </dt>
                                <dd class="col-sm-8"><?= $peta->tahun ?></dd>
                                <dt class="col-sm-4">Kecamatan</dt>
                                <dd class="col-sm-8"><?= $peta->kecamatan ?></dd>
                                <dt class="col-sm-4">Desa</dt>
                                <dd class="col-sm-8"><?= $peta->desa ?></dd>
                                <dt class="col-sm-4">Status Digitasi</dt>
                                <dd class="col-sm-8">
                                    <div class="badge  status"></div>
                                    <?php if (has_permission('Hapus-Digitasi')) : ?>
                                        <button class="btn btn-icon btn-danger btn-hapus-digitasi float-right" onclick="HapusDigitasi(<?= user_id() . ',' . $peta->id_peta ?>)" style="display: none;"><i class="fas fa-trash"></i></button>
                                    <?php endif; ?>
                                </dd>
                            </dl>
                        </div>
                        <!-- Tab Riwayat Download -->
                        <?php if (has_permission('Riwayat')) : ?>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-striped dataTable no-footer display" id="table-riwayat" style="width:100%">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>Tanggal</th>
                                                            <th>Nama</th>
                                                            <th>Jenis File</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h4></h4>
                    <div class="card-header-action">
                        <a href="" data-toggle="modal" data-target="#modal-upload-file-scan" class="btn btn-primary btn-icon btn-tambah-file-scan" hidden>Tambah</i></a>
                        <div class="dropdown download-menu" hidden>
                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Download</a>
                            <div class="dropdown-menu ">
                                <a href="<?= site_url('scan-peta-download/' . user_id() . '/' . $peta->id_peta) ?>" class="dropdown-item has-icon btn-download"><i class="fas fa-download"></i>Scan Peta</i></a>
                                <a href="<?= site_url('digitasi-download/' . user_id() . '/' . $peta->id_peta) ?>" class="dropdown-item has-icon btn-download"><i class="fas fa-download"></i>Digitasi</i></a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>
                        <a href="" data-toggle="modal" data-target="#modal-upload-file-digitasi" class="btn btn-primary btn-icon btn-upload-digitasi" hidden>Upload Digitasi</i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="gallery">
                        <a href="/imageRender/<?= $file_name ?>" target="_blank"><img class="img-fluid" src="<?= $image_path ?>" /></a>
                    </div>
                    <div class="text-center pt-1 pb-1">
                        <?php if (has_permission('Hapus-Peta')) : ?>
                            <a onclick="hapus_gambar(<?= user_id() . ',' . $peta->id_peta ?>)" class="btn btn-danger btn-round btn-hapus-scan" hidden>
                                Hapus Gambar
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- modal -->
<!-- <?= $this->section('modal') ?>
<?= $this->include('FormModal/edit_form') ?>
<?= $this->include('FormModal/upload_file_scan') ?>
<?= $this->include('FormModal/upload_file_digitasi') ?>

<?= $this->endSection() ?> -->

<?= $this->section('page-script') ?>
<!-- simple lightbos library -->
<script src="<?= base_url('assets/simple-lightbox/simple-lightbox.js') ?>"></script>


<script>
    var id = $('#id_peta').val();
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: "<?= site_url('api-peta/') ?>" + id + "/detil",
            data: '',
            dataType: "json",
            // beforeSend: function() {
            //     $('.loader').css('display', 'block')
            // },
            complete: function() {
                $('#loader').css('display', 'none')
            },
            success: function(response) {
                if (response.data.id_scan === null) {
                    $('#proyek').val(response.data.proyek);
                    $('#nomor_peta').val(response.data.nomor_peta);
                    $('#tahun').val(response.data.tahun);
                    $('#kecamatan').val(response.data.kecamatan);
                    $('#desa').val(response.data.desa);
                }

                if (response.data.nama_file === null) {
                    $('.btn-tambah-file-scan').prop('hidden', false)
                } else if (response.data.nama_file != null && response.data.nama_file_digitasi === null) {
                    $('.btn-tambah-file-scan').prop('hidden', true)
                    $('.btn-hapus-scan').prop('hidden', false)
                    $('.download-menu').prop('hidden', false)
                    $('.btn-upload-digitasi').prop('hidden', false)
                } else if (response.data.nama_file != null && response.data.nama_file_digitasi != null) {
                    $('.btn-tambah-file-scan').prop('hidden', true)
                    $('.btn-hapus-scan').prop('hidden', false)
                    $('.download-menu').prop('hidden', false)
                    $('.btn-upload-digitasi').prop('hidden', true)
                    if (response.data.status === 'Belum Terdudukan') {
                        $('.status').prop('hidden', false)
                        $('.status').addClass('badge-danger')
                        $('.status').html('Belum Terdudukan')
                        $('.btn-hapus-digitasi').show()
                    } else {
                        $('.status').prop('hidden', false)
                        $('.status').html('Sudah Terdudukan')
                        $('.status').addClass('badge-success')
                        $('.btn-hapus-digitasi').show()
                    }
                } else {
                    $('.btn-tambah-file-scan').prop('hidden', false)
                }

            },
            error: function(response) {
                alert('gagal updated')
            }
        });

        // datatables riwayat
        $('#table-riwayat').DataTable({
            'processing': true,
            'serverside': true,
            'serveMethod': 'post',
            'lengthMenu': [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            "searching": false,
            'ajax': {
                url: '<?= site_url('api-peta/' . $peta->id_peta . '/detil') ?>',
                dataSrc: 'riwayat'
            },
            'columns': [{
                    data: 'tanggal',
                    render: function(data, row, type) {
                        let date = new Date(data);

                        return date.toLocaleDateString();
                    }
                },
                {
                    data: 'nama'
                },
                {
                    data: 'jenis_file',
                    render: function(data, row, type) {
                        if (data == 0) {
                            return 'Digitasi - dwg'
                        } else {
                            return 'Scan Peta - gambar'
                        }
                    }
                },
                {
                    data: 'aksi',
                    render: function(data, row, type) {
                        switch (data) {
                            case '0':
                                return 'Download';
                                break;
                            case '1':
                                return 'Upload';
                                break;
                            case '2':
                                return 'Hapus';
                                break;
                            default:
                                return 'Tidak ada nilai';
                        }
                    }
                },

            ],
        });
    });

    (function() {
        var $gallery = new SimpleLightbox('.gallery a', {});
    })();
</script>

<!-- ajax -->
<script>
    // ajax edit form
    $(document).on("submit", "#form-edit-peta", function(e) {
        e.preventDefault();
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan mengubah deskripsi',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('penyimpanan-peta/update/') ?>" + id,
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(response) {
                            swal('Berhasil', 'Data berhasil disimpan.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.reload(true);
                                });
                        },
                        error: function(response) {
                            alert(response)
                        }
                    });
                } else {

                }
            });
    });

    // ajax upload file scan
    $(document).on("submit", "#form-upload-file-scan", function(e) {
        e.preventDefault();
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menambahkan file scan.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('penyimpanan-peta/upload/') ?>" + id,
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
                            swal('Berhasil', 'Data berhasil disimpan.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.reload(true);
                                });
                        },
                        error: function(response) {
                            if (response.responseJSON.messages.file_scan) {
                                $('#file-scan').addClass('is-invalid');
                                $('.error-file-scan').html(response.responseJSON.messages.file_scan);
                            } else {
                                $('#file_scan').removeClass('is-invalid');
                            }
                        }
                    });
                } else {

                }
            });
    });

    // ajax upload file digitasi
    $(document).on("submit", "#form-upload-file-digitasi", function(e) {
        e.preventDefault();
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menambahkan file scan.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('penyimpanan-peta/upload-digitasi/') ?>" + id,
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
                            swal('Berhasil', 'Data berhasil disimpan.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.reload(true);
                                    $('.btn-upload-digitasi').prop('hidden', true)
                                });
                        },
                        error: function(response) {
                            if (response.responseJSON.messages.file_digitasi) {
                                $('#file-digitasi').addClass('is-invalid');
                                $('.error-file-digitasi').html(response.responseJSON.messages.file_digitasi);
                            } else {
                                $('#file-digitasi').removeClass('is-invalid');
                            }
                        }
                    });
                } else {

                }
            });
    });

    // ajax hapus deskripsi
    function hapus() {
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menghapus data,',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('penyimpanan-peta/delete/') ?>" + id,
                        dataType: "json",
                        beforeSend: function() {
                            document.querySelector('.loading').style.display = 'block';
                        },
                        complete: function() {
                            document.querySelector('.loading').style.display = 'none';
                        },
                        success: function(response) {
                            swal('Berhasil', 'Data berhasil dihapus.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.assign('<?= previous_url($returnObject = true) ?>')
                                });
                        },
                        error: function(response) {
                            alert(response)
                        }
                    });
                } else {

                }
            });
    }

    // ajax hapus gambar
    function hapus_gambar(user_id, id) {
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menghapus gambar.',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('scan-hapus/') ?>" + user_id + '/' + id,
                        dataType: "json",
                        success: function(response) {
                            swal('Berhasil', 'Data berhasil dihapus.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.assign('<?= previous_url($returnObject = true) ?>')
                                });
                        },
                        error: function(response) {
                            console.log(response)
                        }
                    });
                } else {

                }
            });
    }

    // hapus digitasi
    function HapusDigitasi(user_id, id) {
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menghapus gambar.',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('digitasi-hapus/') ?>" + user_id + '/' + id,
                        dataType: "json",
                        success: function(response) {
                            swal('Berhasil', 'Data berhasil dihapus.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    location.assign('<?= previous_url($returnObject = true) ?>')

                                });
                        },
                        error: function(response) {
                            console.log(id)
                        }
                    });
                } else {

                }
            });
    }

    // download Peta
    function DownloadDigitasi(user_id, id_peta) {
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menghapus gambar.',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "get",
                        url: "<?= site_url('digitasi/download/') ?>" + '/' + user_id + '/' + id_peta,
                        // data: jQuery.param({
                        //     user_id: user_id,
                        //     id_peta: id_peta,
                        // }),
                        dataType: "json",
                        success: function(response) {
                            swal('Berhasil', 'Data berhasil dihapus.', 'success')
                                .then(() => {
                                    // refresh halaman
                                    // location.assign('<?= previous_url($returnObject = true) ?>')
                                    console.log(data)
                                });
                        },
                        error: function(response) {
                            console.log(id)
                        }
                    });
                } else {

                }
            });
    }
</script>
<?= $this->endSection() ?>