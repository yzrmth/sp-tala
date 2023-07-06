<?= $this->extend('_layouts/indexLayout') ?>

<?= $this->section('content') ?>
<div class="section-header">
    <h1><?= $title ?></h1>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Data Scan Peta</h4>
                </div>
                <div class="card-body">
                    <?= $j_peta ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Upload Peta</h4>
                </div>
                <div class="card-body">
                    <?= $j_peta_upload ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="<?= site_url('penyimpanan-peta') ?>">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Digitasi</h4>
                </div>
                <div class="card-body">
                    <?= $j_digitasi ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>