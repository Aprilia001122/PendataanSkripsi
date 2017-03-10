<?php

    class Mahasiswa {
    private $mysqli;
    function __construct($conn){
      $this->mysqli = $conn;
    }
    public function tampil($nim = null){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM mahasiswa";
    if ($nim != null) {
      $sql .= " WHERE nim = $nim";
    }
    $query = $db->query($sql) or die ($db->error);
    return $query;
    }

    public function tambah($nim, $nama, $ttl, $alamat, $ipk, $judul_skripsi, $tlpn, $email, $pem1, $pem2, $thn, $foto){
      $db = $this->mysqli->conn;
      $db->query("INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$ttl', '$alamat', '$ipk', '$judul_skripsi', '$tlpn', '$email', '$pem1', '$pem2', '$thn', '$foto')") or die ($db->error);
    }

        public function hapus($nim){
        $db = $this->mysqli->conn;
            $db->query("DELETE FROM mahasiswa WHERE nim = '$nim'") or die ($db->error);
        }
        
        public function edit($sql){
        $db = $this->mysqli->conn;
            $sb->query($sql) or die ($db->error);
        }
        
        function __destruct(){
            $db = $this->mysqli->conn;
            $db->close();
        }
            
    }
?>