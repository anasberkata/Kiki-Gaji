<?php

// KONEKSI DATABASE =====================================================
$conn = mysqli_connect("localhost", "root", "", "db_sipuji");


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

    $image = "default.jpg";
    $date_created = date("Y-m-d");
    $is_active = 1;

    $cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    $cek_username = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if ($cek_email->num_rows > 0) {
        echo "<script>
                alert('E-Mail sudah terdaftar! Gunakan E-Mail lain');
                document.location.href= 'user_add.php';
            </script>";
    } else if ($cek_username->num_rows > 0) {
        echo "<script>
                alert('username sudah terdaftar! Gunakan username lain!');
                document.location.href= 'user_add.php';
            </script>";
    } else {

        $query = "INSERT INTO users
				VALUES
			(NULL, '$nama', '$username', '$email', '$password', '$image', '$role', '$date_created', '$is_active')
			";

        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function user_edit($data)
{
    global $conn;

    // var_dump($_POST);
    // die;

    $id = $data["id_user"];
    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];
    $email = $data["email"];
    $role = $data["role"];

    $query = "UPDATE users SET
			nama = '$nama',
			username = '$username',
			email = '$email',
			password = '$password',
			role_id = '$role'

            WHERE id_user = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function user_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id_user = $id");
    return mysqli_affected_rows($conn);
}

// --------------------------------------------------------- JABATAN -------------------------------------------------------
function jabatan_tambah($data)
{
    global $conn;

    $jabatan = $data["jabatan"];

    $query = "INSERT INTO jabatan
				VALUES
			(NULL, '$jabatan')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function jabatan_edit($data)
{
    global $conn;

    $id_jabatan = $data["id_jabatan"];
    $jabatan = $data["jabatan"];

    $query = "UPDATE jabatan SET
			jabatan = '$jabatan'

            WHERE id_jabatan = $id_jabatan
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function jabatan_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM jabatan WHERE id_jabatan = $id");
    return mysqli_affected_rows($conn);
}

function karyawan_tambah($data)
{
    global $conn;

    $nama = $data["nama"];
    $jabatan = $data["jabatan"];
    $gaji_pokok = $data["gaji_pokok"];
    $date_created = date("Y-m-d");
    $is_active = 1;

    $query = "INSERT INTO karyawan
				VALUES
			(NULL, '$nama', '$jabatan', '$gaji_pokok', '$date_created', '$is_active')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function karyawan_edit($data)
{
    global $conn;

    $id_karyawan = $data["id_karyawan"];
    $nama = $data["nama"];
    $jabatan = $data["jabatan"];
    $gaji_pokok = $data["gaji_pokok"];

    $query = "UPDATE karyawan SET
			nama = '$nama',
			id_jabatan = '$jabatan',
			gaji_pokok = '$gaji_pokok'

            WHERE id_karyawan = $id_karyawan
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function karyawan_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM karyawan WHERE id_karyawan = $id");
    return mysqli_affected_rows($conn);
}


// --------------------------------------------------------- GAJI-------------------------------------------------------
function gaji_tambah($data)
{
    global $conn;

    $id_petugas = $data["id_petugas"];
    $bulan = $data["tanggal_gaji"];
    $tanggal_gaji = $bulan . "-25";
    $date_created = date("Y-m-d");
    $is_active = 1;

    $query = "INSERT INTO gaji
				VALUES
			(NULL, '$tanggal_gaji', '$id_petugas', '$date_created', '$is_active')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function gaji_delete($id)
{
    global $conn;
    hapus_detail_gaji($id);

    mysqli_query($conn, "DELETE FROM gaji WHERE id_gaji = $id");

    return mysqli_affected_rows($conn);
}

function hapus_detail_gaji($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM gaji_detail WHERE id_gaji = $id");
}

// function gaji_delete_coba01($id)
// {
//     global $conn;

//     $query = "DELETE FROM gaji WHERE id_gaji = $id";
//     $query .= "DELETE FROM gaji_detail WHERE id_gaji = $id";

//     mysqli_multi_query($conn, $query);
//     return mysqli_affected_rows($conn);
// }


function gaji_detail_tambah($data)
{
    global $conn;

    $id_gaji = $data["id_gaji"];
    $id_karyawan = $data["id_karyawan"];
    $kehadiran = $data["kehadiran"];

    $karyawan = query("SELECT * FROM karyawan WHERE id_karyawan = $id_karyawan")[0];
    $total_gaji = $kehadiran * $karyawan["gaji_pokok"];

    $query = "INSERT INTO gaji_detail
				VALUES
			(NULL, '$id_gaji', '$id_karyawan', '$kehadiran', '$total_gaji')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function gaji_detail_edit($data)
{
    global $conn;

    $id_gaji_detail = $data["id_gaji_detail"];
    $id_gaji = $data["id_gaji"];
    $id_karyawan = $data["id_karyawan"];
    $kehadiran = $data["kehadiran"];

    $karyawan = query("SELECT * FROM karyawan WHERE id_karyawan = $id_karyawan")[0];
    $total_gaji = $kehadiran * $karyawan["gaji_pokok"];

    $query = "UPDATE gaji_detail SET
			id_gaji = '$id_gaji',
			id_karyawan = '$id_karyawan',
			kehadiran = '$kehadiran',
			total_gaji = '$total_gaji'

            WHERE id_gaji_detail = $id_gaji_detail
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function gaji_detail_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM gaji_detail WHERE id_gaji_detail = $id");
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
