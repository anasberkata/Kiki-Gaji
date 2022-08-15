<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

if (isset($_POST["gaji_add"])) {
    if (gaji_tambah($_POST) > 0) {
        echo "<script>
            alert('Tanggal Gaji Berhasil Ditambah!');
            document.location.href = 'gaji.php';
            </script>";
    } else {
        echo "<script>
            alert('Tanggal Gaji Gagal Ditambah!');
            document.location.href = 'gaji.php';
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
                        <h5 class="card-header">Tambah Data Gaji</h5>
                    </div>
                    <div class="col">
                        <a href="gaji.php" class="btn btn-primary mt-3 mx-3 float-end">Kembali</a>
                    </div>
                </div>

                <div class="card-body">

                    <form action="" method="POST">
                        <div class="mb-3 row">
                            <input class="form-control" type="hidden" name="id_petugas" value="<?= $my_profile['id_user'] ?>" />
                            <label for="nama" class="col-md-3 col-form-label">Bulan</label>
                            <div class="col-md-9">
                                <input class="form-control" type="month" id="nama" name="tanggal_gaji" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" name="gaji_add" class="btn btn-primary">Tambah</button>
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