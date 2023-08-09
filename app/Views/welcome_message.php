<?= $this->extend('_layouts/indexLayout') ?>

<?= $this->section('content') ?>
<div class="section-header">

</div>

<div class="section-body">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="hero bg-primary text-white">
                <div class="hero-inner">
                    <h2>Welcome, <?= user()->nama ?></h2>
                    <p class="lead"><em>Hope your day is better than yesterday.</em> </p>
                    <div class="mt-4">
                        <a href="<?= site_url('dashboard') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"></i>Let's start</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>