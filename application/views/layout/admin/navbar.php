<nav class="navbar fixed-bottom bg-primary navbar-dark">
        <div class="container">
            <ul class="navbar-nav flex-row justify-content-between w-100">
                <!-- admin navbar -->
                <?php if($this->session->userdata('status') === 'login_admin') : ?>
                <li class="nav-item">
                    <a href="<?= base_url('admin') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-house-user text-center text-white"></i>
                        <span>Dashboard</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/buku') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-book text-center text-white"></i>
                        <span>Buku</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/anggota') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-users text-center text-white"></i>
                        <span>Anggota</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/transaksi') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-wallet text-center text-white"></i>
                        <span>Transaksi</span> 
                    </a>
                </li>
                <?php endif; ?>

                <!-- anggota navbar -->
                <?php if($this->session->userdata('status') === 'login_anggota') : ?>
                <li class="nav-item">
                    <a href="<?= base_url('anggota') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-house-user text-center text-white"></i>
                        <span>Dashboard</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('anggota/buku') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-book text-center text-white"></i>
                        <span>Daftar Buku</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('anggota/peminjaman') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-book-reader text-center text-white"></i>
                        <span>Peminjaman</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('anggota/pengembalian') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-bookmark text-center text-white"></i>
                        <span>Pengembalian</span> 
                    </a>
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= base_url('login/logout') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-sign-out-alt text-center text-white"></i>
                        <span>Keluar</span> 
                    </a>
                </li>
            </ul>
        </div>
    </nav>