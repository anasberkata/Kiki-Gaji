<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

$id_gaji = $_GET["id_gaji"];

$karyawan = query("SELECT * FROM karyawan");


if (isset($_POST["gaji_detail_add"])) {
    if (gaji_detail_tambah($_POST) > 0) {
        echo "<script>
            alert('Input Gaji Berhasil Ditambah!');
            document.location.href = 'gaji_detail.php?id_gaji=' + $id_gaji;
            </script>";
    } else {
        echo "<script>
            alert('Input Gaji Gagal Ditambah!');
            document.location.href = 'gaji_detail.php?id_gaji=' + $id_gaji;
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
                        <h5 class="card-header">Input Gaji</h5>
                    </div>
                    <div class="col">
                        <a href="gaji_detail.php?id_gaji=<?= $id_gaji; ?>"
                            class="btn btn-primary mt-3 mx-3 float-end">Kembali</a>
                    </div>
                </div>

                <div class="card-body">

                    <form action="" method="POST">
                        <div class="mb-3 row">
                            <input class="form-control" type="hidden" name="id_gaji" value="<?= $id_gaji ?>" />
                            <label for="karyawan" class="col-md-3 col-form-label">Karyawan</label>
                            <div class="col-md-9">
                                <select class="form-select" id="karyawan" aria-label="Default select"
                                    name="id_karyawan">
                                    <option>Pilih Karyawan</option>
                                    <?php foreach ($karyawan as $k): ?>
                                        <option value="<?= $k["id_karyawan"]; ?>"><?= $k["nama"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kehadiran" class="col-md-3 col-form-label">Kehadiran</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" id="kehadiran" name="kehadiran" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" name="gaji_detail_add" class="btn btn-primary">Tambah</button>
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