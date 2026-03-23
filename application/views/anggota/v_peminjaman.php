<?php $this->load->view('layout/admin/head'); ?>
<?php $this->load->view('layout/admin/navbar'); ?>

<div class="container">
    <div class="row mb-4">
        <div class="col d-flex justify-content-between align-items-center py-2">
            <h2>Daftar Peminjaman Buku</h2>
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
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Status Transaksi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($peminjaman as $p) : ?>
                    <tr class="align-middle text-center">
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $p['judul_buku'] ?></td>
                        <td><?= $p['tgl_pinjam'] ?></td>
                        <td><?= $p['tgl_kembali'] ?></td>
                        <td><?= $p['status_transaksi'] ?></td>
                        <td>
                            <form action="<?= base_url('anggota/kembalikan') ?>" method="post">
                                <input type="hidden" name="id_transaksi" value="<?= $p['id_transaksi'] ?>">
                                <input type="hidden" name="id_buku" value="<?= $p['id_buku'] ?>">
                                <button type="submit" onclick="return confirm('Apakah yakin kembalikan buku ini?')" class="btn btn-success btn-sm">kembalikan</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('layout/admin/footer'); ?>