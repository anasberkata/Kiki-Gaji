<?php
include "../templates/header.php";
include "../templates/aside.php";
include "../templates/topbar.php";

$jabatan = query("SELECT * FROM jabatan");

if (isset($_POST["karyawan_add"])) {
    if (karyawan_tambah($_POST) > 0) {
        echo "<script>
            alert('Karyawan Berhasil Ditambah!');
            document.location.href = 'karyawan.php';
            </script>";
    } else {
        echo "<script>
            alert('Karyawan Gagal Ditambah!');
            document.location.href = 'karyawan.php';
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
                        <h5 class="card-header">Tambah Karyawan</h5>
                    </div>
                    <div class="col">
                        <a href="karyawan.php" class="btn btn-primary mt-3 mx-3 float-end">Kembali</a>
                    </div>
                </div>

                <div class="card-body">

                    <form action="" method="POST">
                        <div class="mb-3 row">
                            <label for="nama" class="col-md-3 col-form-label">Nama</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="nama" name="nama" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jabatan" class="col-md-3 col-form-label">Jabatan</label>
                            <div class="col-md-9">
                                <select class="form-select" id="role" aria-label="Default select" name="jabatan">
                                    <option>Pilih Jabatan</option>
                                    <?php foreach ($jabatan as $j) : ?>
                                        <option value="<?= $j["id_jabatan"]; ?>"><?= $j["jabatan"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="gaji_pokok" class="col-md-3 col-form-label">Gaji Pokok / Hari (Rp.)</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" id="gaji_pokok" name="gaji_pokok" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" name="karyawan_add" class="btn btn-primary">Tambah</button>
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