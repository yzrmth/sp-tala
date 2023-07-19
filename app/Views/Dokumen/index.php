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
    <a href="<?= site_url('dashboard') ?>" class="btn btn-icon icon-left btn-danger mb-3"><i class="ion-reply"></i> Kembali</a>

    <div class="card">
        <div class="card-body ">
            <a href="" data-toggle="modal" data-target="#modal-tambah-dokumen" class="btn btn-primary btn-icon btn-upload-digitasi mb-2"><i class="fas fa-plus mr-2"></i> Tambah Dokumen</a>
            <div class="table-responsive">
                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped dataTable no-footer" id="table-daftar-peta" role="grid" aria-describedby="table-1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Task Name: activate to sort column ascending" style="width: 100.641px;">Jenis Dokumen</th>
                                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 100.062px;">Nama Dokumen</th>
                                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 66.8906px;"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke">
            This is card footer
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- modal -->
<?= $this->section('modal') ?>

<?= $this->include('FormModal/form_tambah_dokumen') ?>
<?= $this->include('FormModal/form_tambah_jenis_dokumen') ?>

<?= $this->endSection() ?>

<?= $this->section('page-script') ?>
<script>
    // mengambil data pada jenis dokumen
    function getJenisDokumen() {
        $.ajax({
            type: "get",
            url: "<?= site_url('jenis-dokumen') ?>",
            dataType: "json",
            success: function(response) {
                response.data.forEach(function(data) {
                    let o = document.createElement("option");
                    o.text = data.jenis_dokumen;
                    o.value = data.id_jenis_dokumen;
                    JenisDokumen.appendChild(o);
                });
            }
        });
    }

    function showModalJenisDokumen() {
        $("#modal-tambah-dokumen").modal('hide');
        $("#modal-tambah-jenis-dokumen").modal('show');
    }
    // DataTables
    $(document).ready(function() {
        getJenisDokumen();

        $('#table-daftar-peta').DataTable({
            'processing': true,
            'serverside': true,
            'serveMethod': 'post',
            'lengthMenu': [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            'ajax': '<?= site_url('data-dokumen') ?>',
            'columns': [{
                    data: 'jenis_dokumen'
                },
                {
                    data: 'nama_dokumen'
                },
                {
                    data: 'id_dokumen',
                    render: function(data, type, row) {
                        return '<a href="<?= site_url('dokumen/show/') ?>' + data + '"class="btn btn-success btn-sm mr-2"><i class="fas fa-folder"></i></a>';
                    }
                },
            ],
        });
    });

    // submit form tambah jenis dokumen
    $(document).on("submit", "#form-tambah-jenis-dokumen", function(e) {
        e.preventDefault();
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menambahkan jenis dokumen baru.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('jenis-dokumen/add') ?>",
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
                            console.log(response)
                        }
                    });
                } else {

                }
            });
    });

    // submit form tambah  dokumen
    $(document).on("submit", "#form-tambah-dokumen", function(e) {
        e.preventDefault();
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan menambahkan jenis dokumen baru.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('dokumen/add') ?>",
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
                            console.log(response)
                        }
                    });
                } else {

                }
            });
    });
</script>
<?= $this->endSection() ?>