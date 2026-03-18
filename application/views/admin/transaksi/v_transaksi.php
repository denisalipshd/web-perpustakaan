<?php $this->load->view('layout/admin/head'); ?>
<?php $this->load->view('layout/admin/navbar'); ?>

<div class="container">
    <div class="row mb-4">
        <div class="col d-flex justify-content-between align-items-center py-2">
            <h2>Daftar Transaksi</h2>
            <a href="<?= base_url('admin/transaksi/tambah') ?>" class="btn btn-primary">Tambah</a>
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
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Status Transaksi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($transaksi as $t) : ?>
                    <tr class="align-middle text-center">
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $t['nama_anggota'] ?></td>
                        <td><?= $t['judul_buku'] ?></td>
                        <td><?= $t['tgl_pinjam'] ?></td>
                        <td><?= $t['tgl_kembali'] ?></td>
                        <td><?= $t['status_transaksi'] ?></td>
                        <td>
                            <a href="<?= base_url('admin/transaksi/delete/'.$t['id_transaksi']) ?>" onclick="return confirm('Apakah yakin ingin menghapus transaksi ini?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('layout/admin/footer'); ?>