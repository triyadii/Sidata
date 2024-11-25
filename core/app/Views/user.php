<?php
include('nav/header.php')
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Pengguna</li>
            </ol>
        </nav>
        <a data-bs-toggle="modal" data-bs-target="#modalTambahUser"><button type="button" class="btn btn-primary"><i
                    class="bi bi-plus-circle"></i> Tambah Pengguna</button></a>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Pemilih TPS 34</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($data as $d) {
                                    $no++;
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $d['username'] ?></td>
                                        <td><a data-bs-toggle="modal"
                                                data-bs-target="#modalHapus<?= $d['idUser'] ?>"><button type="button"
                                                    class="btn btn-danger"><i class="bi bi-trash"></i></a>

                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modalHapus<?= $d['idUser'] ?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <p>Apakah anda mau menghapus data ini ? </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col-12">
                                                        <a href="<?= base_url() ?>HapusUser/<?= $d['idUser'] ?>"><button
                                                                type="submit" class="btn btn-primary"
                                                                style="width: 100%; background-color:red; color:white; border-color:red;">
                                                                Hapus</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<!-- Modal Tambah User -->
<div class="modal fade" id="modalTambahUser" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="TambahUser" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-12">
                        <label class="form-label">username</label>
                        <div class="input-group has-validation">
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username"
                                required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Password</label>
                        <div class="input-group has-validation">
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password"
                                required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Tambah User</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include('nav/footer.php');
?>