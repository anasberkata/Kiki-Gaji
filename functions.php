<?php

// KONEKSI DATABASE =====================================================
$conn = mysqli_connect("localhost", "root", "", "db_sipedol");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// USER
function user_tambah($data)
{
    global $conn;

    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];
    $email = $data["email"];
    $role = $data["role"];

    $date_created = date("Y-m-d");
    $is_active = 1;

    $cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if ($cek_email->num_rows > 0) {
        echo "<script>
                alert('E-Mail sudah terdaftar!');
                document.location.href= 'user_add.php';
            </script>";
    } else {

        $query = "INSERT INTO users
				VALUES
			(NULL, '$nama', '$email', '$username', '$password', '$role', '$date_created', '$is_active')
			";

        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function user_edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];
    $email = $data["email"];
    $role = $data["role"];

    $query = "UPDATE users SET
			nama = '$nama',
			email = '$email',
			username = '$username',
			password = '$password',
			role_id = '$role'

            WHERE id = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function user_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    return mysqli_affected_rows($conn);
}


// --------------------------------------------------------- LEGAL ---------------------------------------------------------

function legal_tambah($data)
{
    global $conn;

    $kode_dokumen = $data["kode_dokumen"];
    $no_dokumen = $data["no_dokumen"];
    $no_hgb = $data["no_hgb"];
    $no_ajb = $data["no_ajb"];
    $luas_tanah = $data["luas_tanah"];
    $atas_nama = $data["atas_nama"];
    $no_kuasa = $data["no_kuasa"];
    $titik_lokasi = $data["titik_lokasi"];
    $status_dokumen = $data["status_dokumen"];
    $keterangan = $data["keterangan"];
    $date_created = date("Y-m-d");
    $is_active = 1;

    // Upload File
    $file = upload();
    if (!$file) {
        return false;
    }

    $query = "INSERT INTO data_legal
				VALUES
			(NULL, '$kode_dokumen', '$no_dokumen', '$no_hgb', '$no_ajb', '$luas_tanah', '$atas_nama', '$no_kuasa', '$titik_lokasi', '$file', '$status_dokumen', '$keterangan', '$date_created', '$is_active')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function legal_edit($data)
{
    global $conn;

    $id = $data["id"];
    $kode_dokumen = $data["kode_dokumen"];
    $no_dokumen = $data["no_dokumen"];
    $no_hgb = $data["no_hgb"];
    $no_ajb = $data["no_ajb"];
    $luas_tanah = $data["luas_tanah"];
    $atas_nama = $data["atas_nama"];
    $no_kuasa = $data["no_kuasa"];
    $titik_lokasi = $data["titik_lokasi"];
    $status_dokumen = $data["status_dokumen"];
    $keterangan = $data["keterangan"];
    $is_active = $data["is_active"];
    $file_lama = $data["file_lama"];

    if ($_FILES["file"]["error"] === 4) {
        $file = $file_lama;
    } else {
        $file = upload();
    }

    $query = "UPDATE data_legal SET
			kode_dokumen = '$kode_dokumen',
			no_dokumen = '$no_dokumen',
			no_hgb = '$no_hgb',
			no_ajb = '$no_ajb',
			luas_tanah = '$luas_tanah',
			atas_nama = '$atas_nama',
			no_kuasa = '$no_kuasa',
			titik_lokasi = '$titik_lokasi',
			status_dokumen = '$status_dokumen',
			keterangan = '$keterangan',
			is_active = '$is_active',
			file = '$file'

            WHERE id_legal = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES["file"]["name"];
    $ukuranFile = $_FILES["file"]["size"];
    $error = $_FILES["file"]["error"];
    $tmpName = $_FILES["file"]["tmp_name"];

    if ($error === 4) {
        echo "<script>
                alert('File sertifikat wajib diupload!');
            </script>";

        return false;
    }

    $ekstensiFileValid = ["pdf"];
    $ekstensiFile = explode(".", $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "<script>
                alert('File yang diupload bukan PDF!');
            </script>";

        return false;
    }

    // max 10mb
    if ($ukuranFile > 20000000) {
        echo "<script>
                alert('Ukuran file terlalu besar, Maksimal 20mb!');
            </script>";

        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    move_uploaded_file($tmpName, "../dokumen/" . $namaFileBaru);

    return $namaFileBaru;
}

function legal_delete($id)
{
    global $conn;

    $query = "UPDATE data_legal SET
			is_active = 0

            WHERE id_legal = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function legal_active($id)
{
    global $conn;

    $query = "UPDATE data_legal SET
			is_active = 1

            WHERE id_legal = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
