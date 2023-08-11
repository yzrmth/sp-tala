<?= $this->extend('_layouts/indexLayout') ?>

<?= $this->section('content') ?>
<div class="section-header">
    <h1><?= $title ?></h1>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-title">Data Scan Peta

                </div>
                <div class="card-stats-items">
                    <div class="card-stats-item">

                        <div class="card-stats-item-count"><?= $j_peta_upload ?></div>
                        <div class="card-stats-item-label">Upload</div>

                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <a href="<?= site_url('penyimpanan-peta') ?>">
                    <i class="fas fa-archive"></i>
                </a>

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
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-title">Data Digitasi
                </div>
                <div class="card-stats-items">
                    <div class="card-stats-item">
                        <div class="card-stats-item-count"><?= $j_terdudukan ?></div>
                        <div class="card-stats-item-label">Terdudukan</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count"><?= $j_belum_terdudukan ?></div>
                        <div class="card-stats-item-label">Belum <br> Terdudukan</div>
                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-archive"></i>
            </div>
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