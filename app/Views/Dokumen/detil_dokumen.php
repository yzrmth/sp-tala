<?= $this->extend('_layouts/indexLayout') ?>

<?= $this->section('content') ?>
<div class="section-header">
    <h1><?= $title ?></h1>
</div>

<div class="section-body">
    <a href="<?= site_url('dokumen') ?>" class="btn btn-icon icon-left btn-danger mb-3"><i class="ion-reply"></i> Kembali</a>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4></h4>
                    <div class="card-header-action">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                            <div class="dropdown-menu">
                                <a onclick="edit(<?= $data->id_dokumen ?>)" data-toggle="modal" data-target="#modal-edit-dokumen" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                <div class="dropdown-divider"></div>
                                <a onclick="hapus(<?= $data->id_dokumen ?>)" class="dropdown-item has-icon text-danger btn-hapus"><i class="far fa-trash-alt"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Jenis Dokumen</dt>
                        <dd class="col-sm-8"><?= $data->jenis_dokumen ?></dd>
                        <dt class="col-sm-4">Nama Dokumen</dt>
                        <dd class="col-sm-8"><?= $data->nama_dokumen ?></dd>
                        <dt class="col-sm-4">Keterangan</dt>
                        <dd class="col-sm-8"><?= $data->keterangan ?></dd>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-secondary">
                <div class="card-body">
                    <div>
                        <div class="embed-responsive embed-responsive-16by9">

                            <embed class="embed-responsive-item" type="application/pdf" src="/pdfRender/<?= $filepath ?>" allowfullscreen></embed>
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

<?= $this->include('FormModal/form_tambah_dokumen') ?>

<?= $this->endSection() ?>

<?= $this->section('page-script') ?>
<script>
    $(document).ready(function() {
        getJenisDokumen()
    });


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

    // delete data
    function hapus(id) {
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
                        url: "<?= site_url('dokumen/delete/') ?>" + id,
                        dataType: "json",
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
    // RENDER EDIT FORM 
    function edit(id) {
        $.ajax({
            type: "get",
            url: "<?= site_url('dokumen/' . $data->id_dokumen . '/detil') ?>",
            // data: "data",
            dataType: "json",
            success: function(response) {
                // MEMBUKA MODAL FORM TAMBAH/EDIT DOKUMEN
                $("#modal-tambah-dokumen").modal('show');
                // MERUBAH ID FORM
                $(".modal-title").html('Edit Dokumen');
                $("form").attr('id', 'form-edit-dokumen');

                // MENGISI VALUE YANG ADA DI FORM TAMBAH/EDIT DOKUMEN
                $('#id_dokumen').val(response.data.id_dokumen)
                $('#nama_dokumen').val(response.data.nama_dokumen)
                $('#keterangan').val(response.data.keterangan)
                $('#JenisDokumen').val(response.data.id_jenis_dokumen)
                $('#file_dokumen').val('/pdfRender/' + response.data.file_dokumen)
            },
            error: console.error()
        });
    }

    // SUBMIT EDIT DATA
    $(document).on("submit", "#form-edit-dokumen", function(e) {
        let id = $('#id_dokumen').val()
        e.preventDefault();
        swal({
                title: 'Apakah Anda Yakin?',
                text: 'Anda akan merubah data dokumen.',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('dokumen/update/') ?>" + id,
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
                                    // location.reload(true);
                                });
                        },
                        error: function(response) {
                            console.log('gagal')
                        }
                    });
                } else {

                }
            });
    });
</script>
<?= $this->endSection() ?>