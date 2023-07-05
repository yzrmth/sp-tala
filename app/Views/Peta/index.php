<?= $this->extend('_layouts/indexLayout') ?>

<?= $this->section('content') ?>
<div class="section-header">
    <h1><?= $title ?></h1>
</div>

<div class="section-body">
    <h2 class="section-title">This is Example Page</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped dataTable no-footer" id="table-daftar-peta" role="grid" aria-describedby="table-1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Task Name: activate to sort column ascending" style="width: 100.641px;">Nama File Peta</th>
                                        <th class="sorting" tabindex="0" aria-controls="table-1" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 100.062px;">Kecamatan</th>
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

<?= $this->section('page-script') ?>
<script>
    $(document).ready(function() {
        $('#table-daftar-peta').DataTable({
            'processing': true,
            'serverside': true,
            'serveMethod': 'post',
            'lengthMenu': [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            'ajax': '<?= site_url('data-peta') ?>',
            'columns': [{
                    data: 'file_scan'
                },
                {
                    data: 'kecamatan'
                },
                {
                    data: 'id_peta',
                    render: function(data, type, row) {
                        return '<a href="<?= site_url('penyimpanan-peta/show/') ?>' + data + '"class="btn btn-success btn-sm mr-2"><i class="fas fa-folder"></i></a>';
                    }
                },
            ],
        });
    });
</script>
<?= $this->endSection() ?>