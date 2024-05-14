<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Batik Nadril</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <?php
                $username = session()->get('username') ?? 'guest';
                $jabatan = session()->get('jabatan') ?? 'guest';
                ?>
                <a href="#" class="d-block text-capitalize"><?= $username; ?> (<?= $jabatan ?>)</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $pages === 'Dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('produk') ?>" class="nav-link <?= $pages === 'Produk' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('mitra') ?>" class="nav-link <?= $pages === 'Mitra' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>Mitra</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('bahan') ?>" class="nav-link <?= $pages === 'Bahan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Bahan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('penjahit') ?>" class="nav-link <?= $pages === 'Penjahit' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-id-badge"></i>
                        <p>Penjahit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('chat') ?>" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Chat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('home/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>