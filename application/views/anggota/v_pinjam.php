<?php $this->load->view('layout/admin/head'); ?>
<?php $this->load->view('layout/admin/navbar'); ?>

<div class="container">
    <div class="row mb-4">
        <div class="col d-flex justify-content-between align-items-center py-2">
            <h2>Tambah Buku</h2>
            <a href="<?= base_url('anggota/buku') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <form action="<?= base_url('anggota/buku/pinjam/'.$id_buku) ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
                    <span class="text-sm text-danger"><?= form_error('tgl_pinjam'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                    <span class="text-sm text-danger"><?= form_error('tgl_kembali'); ?></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php $this->load->view('layout/admin/footer'); ?>