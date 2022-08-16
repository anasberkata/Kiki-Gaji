<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id = $_GET["id_gaji_detail"];
$id_gaji = $_GET["id_gaji"];

if (gaji_detail_delete($id) > 0) {
    echo "
		<script>
			alert('Data Gaji Karyawan berhasil dihapus!');
			document.location.href = 'gaji_detail.php?id_gaji=' + $id_gaji;
		</script>
	";
} else {
    echo "
		<script>
			alert('Data Gaji Karyawan gagal dihapus!');
			document.location.href = 'gaji_detail.php?id_gaji=' + $id_gaji;
		</script>

	";
}
