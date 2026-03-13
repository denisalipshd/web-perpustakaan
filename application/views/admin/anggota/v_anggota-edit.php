<?php $this->load->view('layout/admin/head'); ?>
<?php $this->load->view('layout/admin/navbar'); ?>

<div class="container">
    <div class="row mb-4">
        <div class="col d-flex justify-content-between align-items-center py-2">
            <h2>Edit Anggota</h2>
            <a href="<?= base_url('admin/anggota') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <form action="<?= base_url('admin/anggota/edit/'.$a['id_anggota']) ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama_anggota" class="form-label">Nama Anggota</label>
                    <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" value="<?= $a['nama_anggota'] ?>">
                    <span class="text-sm text-danger"><?= form_error('nama_anggota'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $a['username'] ?>">
                    <span class="text-sm text-danger"><?= form_error('username'); ?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password_lama" class="form-label">Password Lama</label>
                    <input type="password" name="password_lama" id="password_lama" class="form-control">
                    <span class="text-sm text-danger"><?= form_error('password_lama'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <span class="text-sm text-danger"><?= form_error('password'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" name="nis" id="nis" class="form-control" value="<?= $a['nis'] ?>">
                    <span class="text-sm text-danger"><?= form_error('nis'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $a['kelas'] ?>">
                    <span class="text-sm text-danger"><?= form_error('kelas'); ?></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php $this->load->view('layout/admin/footer'); ?>