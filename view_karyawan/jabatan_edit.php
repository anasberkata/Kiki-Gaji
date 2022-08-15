<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

$id_jabatan = $_GET["id_jabatan"];

$jabatan = query("SELECT * FROM jabatan WHERE id_jabatan = $id_jabatan")[0];

if (isset($_POST["jabatan_edit"])) {
    if (jabatan_edit($_POST) > 0) {
        echo "<script>
            alert('Jabatan Berhasil Diedit!');
            document.location.href = 'jabatan.php';
            </script>";
    } else {
        echo "<script>
            alert('Jabatan Gagal Diedit!');
            document.location.href = 'jabatan.php';
            </script>";
    }
}

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">

        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="row">
                    <div class="col">
                        <h5 class="card-header">Edit Jabatan</h5>
                    </div>
                    <div class="col">
                        <a href="jabatan.php" class="btn btn-primary mt-3 mx-3 float-end">Kembali</a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="" method="POST">
                        <input class="form-control" type="hidden" id="id_jabatan" name="id_jabatan" value="<?= $jabatan['id_jabatan'] ?>" />
                        <div class="mb-3 row">
                            <label for="jabatan" class="col-md-3 col-form-label">Jabatan</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="jabatan" name="jabatan" value="<?= $jabatan['jabatan'] ?>" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" name="jabatan_edit" class="btn btn-primary">Ubah</button>
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