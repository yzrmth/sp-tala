<!-- <div class="mt-3 mb-3 p-2 hide-sidebar-mini text-center">
    <a href="" class="btn btn-warning btn-lg btn-round">
        <i class="fas fa-fire"></i> Kijang Mas Tala
    </a>
</div> -->
<ul class="sidebar-menu mt-2">
    <li class="menu-header">Dashboard</li>
    <li><a class="nav-link" href="<?= site_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
    <li class="menu-header"></li>
    <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Penyimpanan</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= site_url('penyimpanan-peta') ?>">Peta</a></li>
        </ul>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= site_url('dokumen') ?>">Dokumen</a></li>
        </ul>
    <li class="menu-header">Master Data</li>
    </li>
</ul>