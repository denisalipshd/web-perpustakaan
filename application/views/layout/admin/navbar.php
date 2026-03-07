<nav class="navbar fixed-bottom bg-primary navbar-dark">
        <div class="container">
            <ul class="navbar-nav flex-row justify-content-between w-100">
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
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
                    <div class="d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-users text-center text-white"></i>
                        <a class="nav-link py-0" href="#">Anggota</a> 
                    </div>
                </li>
                <li class="nav-item">
                    <div class="d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-wallet text-center text-white"></i>
                        <a class="nav-link py-0" href="#">Transaksi</a> 
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('login/logout') ?>" class="nav-link py-0 d-flex flex-column align-items-center gap-1">
                        <i class="fas fa-sign-out-alt text-center text-white"></i>
                        <span>Keluar</span> 
                    </a>
                </li>
            </ul>
        </div>
    </nav>