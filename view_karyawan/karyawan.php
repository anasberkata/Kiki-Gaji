<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

$karyawan = query("SELECT * FROM karyawan
                INNER JOIN jabatan
                ON karyawan.id_karyawan = jabatan.id_jabatan");
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col mb-4 order-0">

            <div class="card pb-3">
                <div class="row">
                    <div class="col">
                        <h5 class="card-header">Daftar Karyawan</h5>
                    </div>
                    <div class="col">
                        <a href="karyawan_add.php" class="btn btn-primary mt-3 mx-3 float-end">Tambah</a>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Gaji Pokok / Hari</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <?php $i = 1; ?>
                            <?php foreach ($karyawan as $k) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $k["nama"]; ?></td>
                                    <td><?= $k["jabatan"]; ?></td>
                                    <td>Rp. <?= number_format($k["gaji_pokok"], 0, ',', '.'); ?>,-</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="karyawan_edit.php?id_karyawan=<?= $k["id_karyawan"] ?>"><i class="bx bx-edit-alt me-1"></i></a>
                                        <a class="btn btn-sm btn-danger" href="karyawan_delete.php?id_karyawan=<?= $k["id_karyawan"] ?>" onclick="return confirm('Yakin ingin menghapus karyawan: <?= $k['nama'] ?>?')"><i class="bx bx-trash me-1"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- / Content -->



<?php
include "../templates/footer.php";
?>