<?php
require_once('../config/koneksi.php');
require_once('../model/database.php');
include "../model/proses_edit.php";
$connection = new Database($host,$user,$pass,$database);
$mhs = new Mahasiswa($connection);
ini_set('memory_limit', '-1');

$nim = $connection->conn->real_escape_string($_POST['nim']);
$nama = $connection->conn->real_escape_string($_POST['nama']);
$ttl = $connection->conn->real_escape_string($_POST['ttl']);
$alamat = $connection->conn->real_escape_string($_POST['alamat']);
$ipk = $connection->conn->real_escape_string($_POST['ipk']);
$jdl = $connection->conn->real_escape_string($_POST['jdl']);
$tlpn = $connection->conn->real_escape_string($_POST['noTlpn']);
$email = $connection->conn->real_escape_string($_POST['email']);
$dosbing1 = $connection->conn->real_escape_string($_POST['dosbing1']);
$dosbing2 = $connection->conn->real_escape_string($_POST['dosbing2']);
$thn = $connection->conn->real_escape_string($_POST['thn']);

$foto = $_FILES['foto']['nama'];
$extensi = explode(".", $_FILES['foto']['name']);
$foto = "mhs-".round(microtime(true)).".".end($extensi);
$sumber = $_FILES['foto']['tmp_name'];
if($foto == ''){
$mhs->edit("UPDATE mahasiswa SET nim = '$nim',nama = '$nama',ttl = '$ttl',alamat = '$alamat',ipk = '$ipk',judul_skripsi = '$jdl',noTlpn = 'tlpn',email = '$email',pem1 = '$dosbing1',pem2 = '$dosbing2',tahun = '$thn' WHERE nim = '$nim'");
    echo "<script>window.location='?p=tampilData'</script>";
} else {
    $foto = $mhs->tampil($nim)->fetch_object()->foto;
    unlink("../../config/foto/".$foto);
    $upload = move_uploaded_file($sumber, "../../config/foto/".$foto);
    if ($upload) {
        $mhs->edit("UPDATE mahasiswa SET nim = '$nim',nama = '$nama',ttl = '$ttl',alamat = '$alamat',ipk = '$ipk',judul_skripsi = '$jdl',noTlpn = 'tlpn',email = '$email',pem1 = '$dosbing1',pem2 = '$dosbing2',tahun = '$thn',foto = '$foto' WHERE nim = '$nim'");
        echo "<script>window.location='?p=tampilData'</script>";
        } else {
        echo "<script>alert('Upload Gagal!')</script>";
        }
}
 ?>