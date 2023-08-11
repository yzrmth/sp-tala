<ul class="sidebar-menu mt-2">
    <?php if (has_permission('dashboard')) : ?>
        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="<?= site_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
    <?php endif; ?>

    <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-archive"></i> <span>Penyimpanan</span></a>
        <?php if (has_permission('penyimpanan-peta')) : ?>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= site_url('penyimpanan-peta') ?>">Peta</a></li>
            </ul>
        <?php endif; ?>

        <?php if (has_permission('dokumen')) : ?>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= site_url('dokumen') ?>">Dokumen</a></li>
            </ul>
        <?php endif; ?>
    </li>

    <?php if (in_groups("Admin")) : ?>
        <li class="menu-header">Master Data</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Akun</span></a>
            <?php if (has_permission('penyimpanan-peta')) : ?>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= site_url('akun') ?>">Pengguna</a></li>
                </ul>
            <?php endif; ?>
        </li>
    <?php endif; ?>

</ul>