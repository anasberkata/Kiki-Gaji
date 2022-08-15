<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

$id_user = $_GET["id_user"];

$user = query("SELECT * FROM users
                INNER JOIN user_role
                ON users.role_id = user_role.id_role
                WHERE id_user = $id_user
                ")[0];

$user_role = query("SELECT * FROM user_role");

if (isset($_POST["user_edit"])) {
    if (user_edit($_POST) > 0) {
        echo "<script>
            alert('Pengguna Berhasil Diedit!');
            document.location.href = 'users.php';
            </script>";
    } else {
        echo "<script>
            alert('Pengguna Gagal Diedit!');
            document.location.href = 'users.php';
            </script>";
    }
}

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">

        <div class="col-xl-6">
            <div class="card mb-4">
                <h5 class="card-header">Edit Pengguna</h5>
                <div class="card-body">

                    <form action="" method="POST">
                        <input class="form-control" type="hidden" id="id_user" name="id_user" value="<?= $user['id_user'] ?>" />
                        <div class="mb-3 row">
                            <label for="nama" class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="nama" name="nama" value="<?= $user['nama'] ?>" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-md-2 col-form-label">Username</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="username" name="username" value="<?= $user['username'] ?>" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" id="password" name="password" value="<?= $user['password'] ?>" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-2 col-form-label">E-Mail</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" id="email" name="email" value="<?= $user['email'] ?>" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="role" class="col-md-2 col-form-label">Role</label>
                            <div class="col-md-10">
                                <select class="form-select" id="role" aria-label="Default select" name="role">
                                    <option value="<?= $user["role_id"]; ?>"><?= $user["role"]; ?></option>
                                    <?php foreach ($user_role as $ur) : ?>
                                        <option value="<?= $ur["id_role"]; ?>"><?= $ur["role"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" name="user_edit" class="btn btn-primary">Ubah</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- / Content -->



<?php
include "../templates/footer.php";
?>