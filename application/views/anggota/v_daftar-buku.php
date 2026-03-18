<?php $this->load->view('layout/admin/head'); ?>
<?php $this->load->view('layout/admin/navbar'); ?>

<div class="container">
    <div class="row mb-4">
        <div class="col d-flex justify-content-between align-items-center py-2">
            <h2>Daftar Buku</h2>
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
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($buku as $b) : ?>
                    <tr class="align-middle text-center">
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $b['judul_buku'] ?></td>
                        <td><?= $b['pengarang'] ?></td>
                        <td><?= $b['penerbit'] ?></td>
                        <td><?= $b['tahun_terbit'] ?></td>
                        <td><?= $b['status'] ?></td>
                        <td>
                            <a href="<?= base_url('anggota/buku/pinjam/'.$b['id_buku']) ?>" class="btn btn-success btn-sm">Pinjam</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('layout/admin/footer'); ?>