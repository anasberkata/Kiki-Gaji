<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

$gaji = query("SELECT * FROM gaji
                INNER JOIN users
                ON gaji.id_petugas = users.id_user
                ORDER BY tanggal_gaji DESC");
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col mb-4 order-0">

            <div class="card pb-3">
                <div class="row">
                    <div class="col">
                        <h5 class="card-header">Data Gaji</h5>
                    </div>
                    <div class="col">
                        <a href="gaji_add.php" class="btn btn-primary mt-3 mx-3 float-end">Tambah</a>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bulan</th>
                                <th>Petugas</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <?php $i = 1; ?>
                            <?php foreach ($gaji as $g) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= date('F Y', strtotime($g["tanggal_gaji"])); ?></td>
                                    <td><?= $g["nama"]; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="gaji_detail.php?id_gaji=<?= $g["id_gaji"] ?>"><i class="bx bx-edit-alt me-1"></i> Input</a>
                                        <a class="btn btn-sm btn-danger" href="gaji_delete.php?id_gaji=<?= $g["id_gaji"] ?>" onclick="return confirm('Yakin ingin menghapus gaji bulan: <?= date('F Y', strtotime($g["tanggal_gaji"])); ?>?')"><i class="bx bx-trash me-1"></i></a>
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