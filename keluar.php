<?php 
// Mematikan sesi variabel superGlobal session
session_start();

$_SESSION = array();
session_unset();
session_destroy();

// Cek apakah session tidak ada nilai
if ( !isset($_SESSION["pengguna"]) > 0) {
    echo "
    <script>
      alert('Yakin mau keluar?');
      document.location.href = 'masuk.php';
    </script>
    ";
} 

?>