<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Daftar Kontak 
                        <a href="<?= site_url('kontak/tambah') ?>" class="btn btn-success float-right">
                            <i class="fas fa-plus"></i> Tambah Kontak
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <?php if($this->session->flashdata('success')): ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: '<?= $this->session->flashdata('success') ?>',
                                confirmButtonText: 'OK'
                            });
                        </script>
                    <?php endif; ?>

                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nomor KTP</th>
                                <th>Nama</th>
                                <th>Nomor HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($kontaks as $kontak): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $kontak->no_ktp ?></td>
                                <td><?= $kontak->nama ?></td>
                                <td><?= $kontak->no_hp ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= site_url('kontak/ubah/'.$kontak->id) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm btn-hapus" data-id="<?= $kontak->id ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-hapus').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data kontak ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= site_url('kontak/hapus/') ?>" + id;
                }
            });
        });
    });
</script>
