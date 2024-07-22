<?php 
// cek belum masuk/login
session_start();

if (!isset($_SESSION["pengguna"])) {
  header("Location: ../masuk.php");
  exit;
}

require 'koneksi.php';

// menangkap data id
$hapus = $_GET["Kode_Barang"];

// Memeriksa apakah data berhasil dihapus atau tidak
if ( hapus($hapus) > 0) {
    echo "
    <script>
      alert('Data berhasil dihapus!');
      document.location.href = '../index.php';
    </script>
    ";
} else {
    echo "
    <script>
      alert('Data gagal dihapus!');
      document.location.href = '../index.php';
    </script>
    ";
}
?>
