<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Tambah Kontak Baru</h3>
                </div>
                <div class="card-body">
                    <?= form_open('kontak/tambah', ['id' => 'contactForm']) ?>
                        <div class="form-group">
                            <label for="no_ktp">Nomor KTP</label>
                            <input type="text" name="no_ktp" class="form-control <?= form_error('no_ktp') ? 'is-invalid' : '' ?>" 
                                   value="<?= set_value('no_ktp') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('no_ktp') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" 
                                   value="<?= set_value('nama') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('nama') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input type="text" name="no_hp" class="form-control <?= form_error('no_hp') ? 'is-invalid' : '' ?>" 
                                   value="<?= set_value('no_hp') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('no_hp') ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('kontak') ?>" class="btn btn-secondary">Kembali</a>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Tambah Kontak Berhasil!',
            text: 'Kontak baru telah berhasil ditambahkan.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>