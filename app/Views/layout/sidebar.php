<div class="sb-sidenav-menu">
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Fitur</div>
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
        </a>
        <?php if (session()->get('desa') == null) : ?>
            <a class="nav-link" href="<?= base_url('akun') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                Akun
            </a>
        <?php endif ?> 
        <?php if (session()->get('desa') == null) : ?>
            <a class="nav-link" href="<?= base_url('daftar_tps') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-vote-yea"></i></div>
                Daftar TPS Tabanan
            </a>
        <?php endif ?> 
        <?php if (session()->get('desa') != null) : ?>
            <a class="nav-link" href="<?= base_url('calon_perbekel') ?>/<?= session()->get('desa') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                Calon Perbekel 
            </a>
        <?php endif ?>        
        <?php if (session()->get('desa') != null) : ?>
            <a class="nav-link" href="<?= base_url('tps') ?>/<?= session()->get('desa'); ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                TPS Desa <?= session()->get('nama_desa') ?>
            </a>
        <?php endif ?>                         
    </div>
</div>
<div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
    <?= session()->get('nama_depan') ?> <?= session()->get('nama_belakang') ?>
</div>