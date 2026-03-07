<?php $this->load->view('layout/admin/head'); ?>
<?php $this->load->view('layout/admin/navbar'); ?>

<div class="container">
    <div class="row mb-4">
        <div class="col d-flex justify-content-between align-items-center py-2">
            <h2>Tambah Buku</h2>
            <a href="<?= base_url('admin/buku') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <form action="<?= base_url('admin/buku/tambah') ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="judul_buku" class="form-label">Judul</label>
                    <input type="text" name="judul_buku" id="judul_buku" class="form-control">
                    <span class="text-sm text-danger"><?= form_error('judul_buku'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input type="text" name="pengarang" id="pengarang" class="form-control">
                    <span class="text-sm text-danger"><?= form_error('pengarang'); ?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" class="form-control">
                    <span class="text-sm text-danger"><?= form_error('penerbit'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control">
                    <span class="text-sm text-danger"><?= form_error('tahun_terbit'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak">Tidak</option>
                    </select>
                    <span class="text-sm text-danger"><?= form_error('status'); ?></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php $this->load->view('layout/admin/footer'); ?>