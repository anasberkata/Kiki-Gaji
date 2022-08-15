<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

$jabatan = query("SELECT * FROM jabatan");
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-lg-6 mb-4 order-0">

            <div class="card pb-3">
                <div class="row">
                    <div class="col">
                        <h5 class="card-header">Daftar Jabatan</h5>
                    </div>
                    <div class="col">
                        <a href="jabatan_add.php" class="btn btn-primary mt-3 mx-3 float-end">Tambah</a>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jabatan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <?php $i = 1; ?>
                            <?php foreach ($jabatan as $j) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $j["jabatan"]; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="jabatan_edit.php?id_jabatan=<?= $j["id_jabatan"] ?>"><i class="bx bx-edit-alt me-1"></i></a>
                                        <a class="btn btn-sm btn-danger" href="jabatan_delete.php?id_jabatan=<?= $j["id_jabatan"] ?>" onclick="return confirm('Yakin ingin menghapus jabatan: <?= $j['jabatan'] ?>?')"><i class="bx bx-trash me-1"></i></a>
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