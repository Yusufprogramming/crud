<?php 
// cek pengguna belum masuk/login
session_start();

if (!isset($_SESSION["pengguna"])) {
  header("Location: masuk.php");
  exit;
}

require 'crud/koneksi.php';

$databarang = query("SELECT * FROM tabel_barang ORDER BY Kode_Barang ASC");

// Tombol cari ditekan
if (isset($_POST["cari"])) {
   $databarang = cari($_POST["keyword"]);
   
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php 
 $sidebar = true;
 if ($sidebar) {
    echo "<script src=layout/sidebar.js></script>"; 
 }
?>

<!-- Card -->
<div class="container">

<div class="card mt-5">
  <div class="card-header bg-primary text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-add" viewBox="0 0 18 18">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h4a.5.5 0 1 0 0-1h-4a.5.5 0 0 1-.5-.5V7.207l5-5 6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
   <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 1 0 1 0v-1h1a.5.5 0 1 0 0-1h-1v-1a.5.5 0 0 0-.5-.5"/>
    </svg> Data Barang </div>
  
  <!-- Tombol Keluar  -->
  <button class="btn btn-sm btn-warning"><a href="keluar.php" class="text-dark text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 18 18">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
</svg> Keluar</a>
  </button>
  
  <!-- Tombol Tambah -->
  <div class="text-end mx-3">
  <div class="card-body">
    <button class="btn btn-success"><a href="crud/tambah.php" class="text-light text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 18 18">
       <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
       <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
         </svg> Tambah Data </a>
         </button>
      </div>
    </div>  
     
    <!-- Form Dasboar -->
    <form action="" method="post" enctype="multipart/form-data">

    <div class="input-group mb-3 mx-4 w-50">
      <input type="text" name="keyword" class="form-control" placeholder="Cari data barang" aria-label="Recipient's username" aria-describedby="button-addon2" autofocus autocomplete="0ff">
        <button name="cari" class="btn btn-outline-secondary" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 18 18">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
         </svg></button>
      </div>

     <div class="p-4">
    <table class="table table-bordered table-striped table-hover">
  <thead>
    <tr class="table-secondary text-center">
      <th>No</th>
      <th>Gambar</th>
      <th>Nama Barang</th>
      <th>Harga</th>
      <th>Jumlah Barang</th>
      <th>Jenis Barang</th>
      <th>Merk</th>
      <th>Aksi</th>
    </tr>
    <?php foreach($databarang as $row) : ?>
    <tr class="text-center">
      <td><?=$row["Kode_Barang"];?></td>
      <td><img src="asset/<?= $row["Gambar"];?>" width="50px"></td>
      <td><?=$row["Nama_Barang"];?></td>
      <td><?=$row["Harga"];?></td>
      <td><?=$row["Jumlah_Barang"];?></td>
      <td><?=$row["Jenis_Barang"];?></td>
      <td><?=$row["Merk"];?></td>
      <td>
          <a href="crud/edit.php?Kode_Barang=<?=$row["Kode_Barang"];?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 18 18">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg> Edit</a>

          <a href="crud/hapus.php?Kode_Barang=<?=$row["Kode_Barang"];?>" class="btn btn-danger mx-2" onclick="return confirm('Yakin ingin menghapus?')"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 18 18">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
</svg> Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </thead>
  </tbody>
   </table>
   </div>
 </form>
  </div>
</div>
<!-- Bootstrap JS -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-98UomMGXDV1HLECcgDZlj5tF1Pq55nrxENZ0/F4qsd5Ox4G47ZeODpSv8Kk70z6V" crossorigin="anonymous"></script>
</body>
</html>