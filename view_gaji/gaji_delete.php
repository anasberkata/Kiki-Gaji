<?php
session_start();

if (!isset($_SESSION['login'])) {
	header("Location: ../index.php");
	exit;
}

require "../functions.php";

$id = $_GET["id_gaji"];

if (gaji_delete($id) > 0) {
	echo "
		<script>
			alert('Data Gaji berhasil dihapus!');
			document.location.href = 'gaji.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data Gaji gagal dihapus!');
			document.location.href = 'gaji.php';
		</script>

	";
}
