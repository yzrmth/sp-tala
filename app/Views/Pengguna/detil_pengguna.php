<?= $this->extend('_layouts/indexLayout') ?>

<?= $this->section('content') ?>
<div class="section-header">
    <h1><?= $title ?></h1>
</div>

<div class="section-body">
    <a href="<?= site_url('dokumen') ?>" class="btn btn-icon icon-left btn-danger mb-3"><i class="ion-reply"></i> Kembali</a>
    <h2 class="section-title">Hi, <?= $dataUser->nama ?></h2>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="<?= site_url('templates/') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <!-- <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Posts</div>
                            <div class="profile-widget-item-value">187</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Followers</div>
                            <div class="profile-widget-item-value">6,8K</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Following</div>
                            <div class="profile-widget-item-value">2,1K</div>
                        </div>
                    </div> -->
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name"><?= $dataUser->nama ?> <div class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> <?= $dataUser->jabatan ?>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <!-- <div class="font-weight-bold mb-2">Follow Ujang On</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                        <i class="fab fa-instagram"></i>
                    </a> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">

                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>