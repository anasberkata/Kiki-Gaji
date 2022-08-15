<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

if (isset($_POST["jabatan_add"])) {

    if (jabatan_tambah($_POST) > 0) {
        echo "<script>
            alert('Jabatan Berhasil Ditambah!');
            document.location.href = 'jabatan.php';
            </script>";
    } else {
        echo "<script>
            alert('jabatan Gagal Ditambah!');
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
                        <h5 class="card-header">Tambah Jabatan</h5>
                    </div>
                    <div class="col">
                        <a href="jabatan.php" class="btn btn-primary mt-3 mx-3 float-end">Kembali</a>
                    </div>
                </div>

                <div class="card-body">

                    <form action="" method="POST">
                        <div class="mb-3 row">
                            <label for="jabatan" class="col-md-3 col-form-label">Jabatan</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="jabatan" name="jabatan" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" name="jabatan_add" class="btn btn-primary">Tambah</button>
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