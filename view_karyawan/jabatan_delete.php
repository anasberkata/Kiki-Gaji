<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id = $_GET["id_jabatan"];

if (jabatan_delete($id) > 0) {
    echo "
		<script>
			alert('Jabatan berhasil dihapus!');
			document.location.href = 'jabatan.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Jawaban gagal dihapus!');
			document.location.href = 'jabatan.php';
		</script>

	";
}
