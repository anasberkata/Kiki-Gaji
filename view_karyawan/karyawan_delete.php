<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id = $_GET["id_karyawan"];

if (karyawan_delete($id) > 0) {
    echo "
		<script>
			alert('Karyawan berhasil dihapus!');
			document.location.href = 'karyawan.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Karyawan gagal dihapus!');
			document.location.href = 'karyawan.php';
		</script>

	";
}
