<?= $this->extend('_layouts/indexLayout') ?>

<?= $this->section('content') ?>
<div class="section-header">
    <h1><?= $title ?></h1>
</div>

<div class="section-body">
    <h2 class="section-title">Dokumen</h2>
    <p class="section-lead">
        Silahkan upload dokumen apapapun disini.
    </p>
    <a href="<?= site_url('') ?>" class="btn btn-icon icon-left btn-danger mb-3"><i class="ion-reply"></i> Kembali</a>

    <div class="card">
        <div class="card-body ">
            <a href="" data-toggle="modal" data-target="#modal-pengguna-baru" class="btn btn-primary btn-icon mb-2"><i class="fas fa-plus mr-2"></i> Tambah Pengguna</a>
            <div class="table-responsive">
                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped dataTable no-footer" id="table-daftar-peta" role="grid" aria-describedby="table-1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Task Name: activate to sort column ascending" style="width: 100.641px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 100.062px;">Nama Jabatan</th>
                                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 100.062px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 66.8906px;"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<!-- modal -->
<?= $this->section('modal') ?>

<?= $this->include('FormModal/form_pengguna_baru') ?>

<?= $this->endSection() ?>


<?= $this->section('page-script') ?>
<script>
    $(document).ready(function() {
        // Mengambil Data Profil/Role
        $.ajax({
            type: "get",
            url: "<?= site_url('data-profil') ?>",
            dataType: "json",
            success: function(response) {
                response.data.forEach(function(data) {
                    let o = document.createElement("option");
                    o.text = data.name;
                    o.value = data.name;
                    role.appendChild(o);
                });
            }
        });

        // DataTable
        $('#table-daftar-peta').DataTable({
            'processing': true,
            'serverside': true,
            'serveMethod': 'post',
            'lengthMenu': [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            'ajax': '<?= site_url('data-pengguna') ?>',
            'columns': [{
                    data: 'nama'
                },
                {
                    data: 'jabatan'
                },
                {
                    data: 'active',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return '<div class="badge badge-success">Aktif</div>'
                        } else {
                            return '<div class="badge badge-danger">Tidak Aktif</div>'
                        }
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return '<a href="<?= site_url('pengaturan-akun/') ?>' + data + '"class="btn btn-success btn-sm mr-2"><i class="fas fa-folder"></i></a>';
                    }
                },
            ],
        });
    });

    // ajax tambah pengguna
    $(document).on("submit", "#form-tambah-pengguna-baru", function(e) {
        e.preventDefault();
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menambahkan pengguna baru.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('akun/create') ?>",
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
                            if (response.responseJSON.messages.nama) {
                                $('#nama').addClass('is-invalid');
                                $('.error-nama').html(response.responseJSON.messages.nama);
                            } else {
                                $('#nama').removeClass('is-invalid');
                            }
                            if (response.responseJSON.messages.nip) {
                                $('#nip').addClass('is-invalid');
                                $('.error-nip').html(response.responseJSON.messages.nip);
                            } else {
                                $('#nip').removeClass('is-invalid');
                            }
                            if (response.responseJSON.messages.jabatan) {
                                $('#jabatan').addClass('is-invalid');
                                $('.error-jabatan').html(response.responseJSON.messages.jabatan);
                            } else {
                                $('#jabatan').removeClass('is-invalid');
                            }
                            if (response.responseJSON.messages.email) {
                                $('#email').addClass('is-invalid');
                                $('.error-email').html(response.responseJSON.messages.email);
                            } else {
                                $('#email').removeClass('is-invalid');
                            }
                            if (response.responseJSON.messages.username) {
                                $('#username').addClass('is-invalid');
                                $('.error-username').html(response.responseJSON.messages.username);
                            } else {
                                $('#username').removeClass('is-invalid');
                            }
                            if (response.responseJSON.messages.role) {
                                $('#role').addClass('is-invalid');
                                $('.error-role').html(response.responseJSON.messages.role);
                            } else {
                                $('#role').removeClass('is-invalid');
                            }
                        }
                    });
                }
            });
    });
</script>
<?= $this->endSection() ?>