<?php
include('nav/header.php')
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Daftar Pemilih Tetap</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Pemilih Tetap</li>
            </ol>
        </nav>
        <a data-bs-toggle="modal" data-bs-target="#modalTambahPemilih"><button type="button" class="btn btn-primary"><i
                    class="bi bi-plus-circle"></i> Tambah Pemilih</button></a>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kehadiran</th>
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
                                        <td><?= $d['namaPemilih'] ?></td>
                                        <td><?= $d['jenisKelamin'] ?></td>
                                        <td><?= $d['alamat'] ?></td>
                                        <td>
                                            <?php
                                            if ($d['kehadiran'] == 0) { ?>
                                                <span style="color: red;">Tidak Hadir</span>
                                            <?php

                                            } else if ($d['kehadiran'] = 1) { ?>
                                                <span style="color: green;">Hadir</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($d['kehadiran'] == 0) { ?>
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#modalKehadiran<?= $d['idDPT'] ?>"><button type="button"
                                                        class="btn btn-success"><i class="bi bi-check-circle"></i></button></a>
                                            <?php
                                            } else if ($d['kehadiran'] == 1) { ?>
                                                <a data-bs-toggle="modal" data-bs-target="#modalKehadiran<?= $d['idDPT'] ?>"
                                                    style="background-color: red;"> <button type="button"
                                                        class="btn btn-danger"><i
                                                            class="bi bi-exclamation-octagon"></i></button></a>
                                            <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <!-- Modal Validasi Penghapusan -->
                                    <div class="modal fade" id="modalKehadiran<?= $d['idDPT'] ?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Kehadiran</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <?php
                                                if ($d['kehadiran'] == 0) { ?>
                                                    <div class="modal-body">
                                                        <div class="col-12">
                                                            <p>Apakah pemilih hadir ? </p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="col-12">
                                                            <a href="<?= base_url() ?>KonfirmasiKehadiran/<?= $d['idDPT'] ?>/1"><button
                                                                    type="submit" class="btn btn-primary"
                                                                    style="width: 100%; background-color:green; color:white; border-color:green;">
                                                                    Hadir</button></a>
                                                        </div>
                                                    </div>
                                                <?Php
                                                } else if ($d['kehadiran'] == 1) { ?>
                                                    <div class="modal-body">
                                                        <div class="col-12">
                                                            <p>Apakah pemilih Tidak hadir ? </p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="col-12">
                                                            <a href="<?= base_url() ?>KonfirmasiKehadiran/<?= $d['idDPT'] ?>/0"><button
                                                                    type="submit" class="btn btn-primary"
                                                                    style="width: 100%; background-color:red; color:white; border-color:red;">
                                                                    Tidak Hadir</button></a>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
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
<div class="modal fade" id="modalTambahPemilih" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pemilih</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="TambahPemilih" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-12">
                        <label class="form-label">Nama</label>
                        <div class="input-group has-validation">
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Alamat</label>
                        <div class="input-group has-validation">
                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat"
                                required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenisKelamin" class="form-control" required>
                            <option value="">- Silahkan Pilih Jenis Kelamin -</option>
                            <option value="L">Laki Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Status Pemilih</label>
                        <div class="input-group has-validation">
                            <select name="status" class="form-control" required>
                                <option value="">- Silahkan Pilih Status -</option>
                                <option value="2">Pemilih Tambahan</option>
                                <option value="3">Pemilih Khusus</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Tambah Pemilih</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include('nav/footer.php');
?>