<?php $this->load->view('layout/admin/head'); ?>
<?php $this->load->view('layout/admin/navbar'); ?>

<div class="container">
    <div class="row mb-4">
        <div class="col d-flex justify-content-between align-items-center py-2">
            <h2>Daftar Anggota</h2>
            <a href="<?= base_url('admin/anggota/tambah') ?>" class="btn btn-primary">Tambah</a>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <?php if($this->session->flashdata('success')) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Username</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($anggota as $a) : ?>
                    <tr class="align-middle text-center">
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $a['nama_anggota'] ?></td>
                        <td><?= $a['username'] ?></td>
                        <td><?= $a['nis'] ?></td>
                        <td><?= $a['kelas'] ?></td>
                        <td>
                            <a href="<?= base_url('admin/anggota/edit/'.$a['id_anggota']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('admin/anggota/delete/'.$a['id_anggota']) ?>" onclick="return confirm('Apakah yakin ingin menghapus anggota ini?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('layout/admin/footer'); ?>