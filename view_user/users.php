<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

$users = query("SELECT * FROM users
                INNER JOIN user_role
                ON users.role_id = user_role.id_role");
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col mb-4 order-0">

            <div class="card pb-3">
                <div class="row">
                    <div class="col">
                        <h5 class="card-header">Daftar Pengguna</h5>
                    </div>
                    <div class="col">
                        <a href="user_add.php" class="btn btn-primary mt-3 mx-3 float-end">Tambah</a>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>username</th>
                                <th>E-Mail</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <?php $i = 1; ?>
                            <?php foreach ($users as $u) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $u["nama"]; ?></td>
                                    <td><?= $u["username"]; ?></td>
                                    <td><?= $u["email"]; ?></td>
                                    <td><?= $u["role"]; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="user_edit.php?id_user=<?= $u["id_user"] ?>"><i class="bx bx-edit-alt me-1"></i></a>
                                        <a class="btn btn-sm btn-danger" href="user_delete.php?id_user=<?= $u["id_user"] ?>" onclick="return confirm('Yakin ingin menghapus pengguna: <?= $u['name'] ?>?')"><i class="bx bx-trash me-1"></i></a>
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