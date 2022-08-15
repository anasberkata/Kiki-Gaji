<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

$id_gaji = $_GET["id_gaji"];

$gaji = query("SELECT * FROM gaji
                INNER JOIN users
                ON gaji.id_petugas = users.id_user
                WHERE id_gaji = $id_gaji")[0];

$gaji_detail = query("SELECT * FROM gaji_detail
                INNER JOIN karyawan
                ON gaji_detail.id_karyawan = karyawan.id_karyawan
                WHERE id_gaji = $id_gaji");
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col mb-4 order-0">

            <div class="card pb-3">
                <div class="row">
                    <div class="col">
                        <h5 class="card-header">Data Gaji Bulan : <?= date('F Y', strtotime($gaji["tanggal_gaji"])); ?></h5>
                    </div>
                    <div class="col">
                        <a href="gaji_detail_add.php?id_gaji=<?= $id_gaji; ?>" class="btn btn-primary mt-3 mx-3 float-end">Input Gaji</a>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Karyawan</th>
                                <th>Kehadiran</th>
                                <th>Total Gaji</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <?php $i = 1; ?>
                            <?php foreach ($gaji_detail as $gd) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $gd["nama"]; ?></td>
                                    <td><?= $gd["kehadiran"]; ?> Hari</td>
                                    <td>Rp. <?= number_format($gd["total_gaji"], 0, ',', '.'); ?>,-</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="gaji_detail_edit.php?id_gaji_detail=<?= $gd["id_gaji_detail"] ?>&id_gaji=<?= $gd["id_gaji"] ?>"><i class="bx bx-edit-alt"></i></a>
                                        <a class="btn btn-sm btn-danger" href="gaji_detail_delete.php?id_gaji_detail=<?= $gd["id_gaji_detail"] ?>" onclick="return confirm('Yakin ingin menghapus gaji karyawan: <?= $gd['id_karyawan'] ?>?')"><i class="bx bx-trash"></i></a>
                                        <a class="btn btn-sm btn-warning" href="gaji_detail_print.php?id_gaji_detail=<?= $gd["id_gaji_detail"] ?>"><i class="bx bx-download"></i></a>
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