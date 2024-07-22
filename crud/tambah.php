<?php 
// cek belum masuk/login
session_start();

if (!isset($_SESSION["pengguna"])) {
  header("Location: ../masuk.php");
  exit;
}

 require 'koneksi.php';
 if ( isset($_POST["kirim"])) {

    
  if (tambah($_POST) > 0) {
    echo "
      <script>
        alert('Data berhasil ditambahkan!');
        document.location.href = '../index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Data gagal ditambahkan!');
        document.location.href = '../index.php';
      </script>
    ";
  }

  if (isset($_POST["close"])) {
     echo "
      <script> dokument.location.href = '../index.php'; </script>
     ";
  }

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <!-- Form Tambah Data Barang -->  
 <div class="container my-3">
 <form class="border p-5 shadow-sm rounded w-50 mx-auto" action="" method="post" enctype="multipart/form-data" >
  <fieldset>

  <h3 class="text-center my-5">Tambah Data Barang</h3>
   
    <!-- Text Field -->
    <div class="mb-3">
      <label for="kodebarang" class="form-label">Kode Barang</label>
      <input type="text" name="Kode_Barang" id="kodebarang" class="form-control" placeholder="Masukan Kode Barang" required>
    </div>
    
    <label for="gambar" class="form-label">Gambar</label>
   <div class="input-group mb-3">
    <input type="file" class="form-control" name="Gambar" id="Gambar">
    <label class="input-group-text" for="gambar">Upload</label>
  </div>

    <div class="mb-3">
      <label for="namabarang" class="form-label">Nama Barang</label>
      <input type="text" name="Nama_Barang" id="namabarang" class="form-control" placeholder=" Masukan Nama Barang" required>
    </div>

    <div class="mb-3 my-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="text" name="Harga" id="harga" class="form-control" placeholder="Masukan Harga" required>
    </div>

    <div class="mb-3">
      <label for="jumlahbarang" class="form-label">Jumlah Barang</label>
      <input type="text" name="Jumlah_Barang" id="jumlahbarang" class="form-control" placeholder="Masukan Jumlah Barang" required>
    </div>
      
    <h5>Jenis Barang</h5>
    <select class="form-select" aria-label="Default select example" name="Jenis_Barang" id="jenisbarang" required>
           <option value="Makanan" name="Jenis_Barang">Makanan</option>
           <option value="Minuman" name="Jenis_Barang">Minuman</option>
   </select>
      <br>
    <div class="mb-3">
      <label for="merk" class="form-label">Merk</label>
      <input type="text" name="Merk" id="merk" class="form-control" placeholder="Masukan Merk" required>
    </div>

   <!-- Tombol Tambah | Kembali -->
    <div class="d-flex justify-content-evenly gap-3">
    <button class="btn btn-sm btn-warning my-3 w-50"><a href="../index.php" class="text-dark text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 19 19">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
</svg> Kembali</a>
     </button>

<button type="submit" class="btn btn-success my-3 w-50" name="kirim" id="submit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 18 18">
       <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
       <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
         </svg> Tambah</button>
    </div>

  </fieldset>
</form>
 </div>
</body>
</html>