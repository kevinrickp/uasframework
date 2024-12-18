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
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nomor KTP</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($kontaks as $kontak): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $kontak->no_ktp ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link" type="button" id="dropdownMenuButton" 
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?= $kontak->nama ?>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?= site_url('kontak/ubah/'.$kontak->id) ?>">
                                                <i class="fas fa-edit"></i> Ubah
                                            </a>
                                            <a class="dropdown-item text-danger" href="<?= site_url('kontak/hapus/'.$kontak->id) ?>" 
                                               onclick="return confirm('Yakin hapus kontak?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= site_url('kontak/ubah/'.$kontak->id) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= site_url('kontak/hapus/'.$kontak->id) ?>" class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Yakin hapus kontak?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
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