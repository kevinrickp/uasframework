<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h3 class="card-title">Ubah Kontak</h3>
                </div>
                <div class="card-body">
                    <?= form_open('kontak/ubah/'.$kontak->id) ?>
                        <div class="form-group">
                            <label for="no_ktp">Nomor KTP</label>
                            <input type="text" name="no_ktp" class="form-control <?= form_error('no_ktp') ? 'is-invalid' : '' ?>" 
                                   value="<?= $kontak->no_ktp ?>">
                            <div class="invalid-feedback">
                                <?= form_error('no_ktp') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" 
                                   value="<?= $kontak->nama ?>">
                            <div class="invalid-feedback">
                                <?= form_error('nama') ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="<?= site_url('kontak') ?>" class="btn btn-secondary">Kembali</a>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>