<?php 
// cek belum masuk/login
session_start();

if (!isset($_SESSION["pengguna"])) {
  header("Location: ../masuk.php");
  exit;
}

 require 'koneksi.php';

 // Ambil data di URL
$Kode_Barang = $_GET["Kode_Barang"];

// Query data barang 
$data = query("SELECT * FROM tabel_barang WHERE Kode_Barang = $Kode_Barang")[0]; 

 // Cek tombol submit sudah ditekan atau belum
 if ( isset($_POST["submit"])) {

 // Cek data berhasil diedit atau belum
  if (edit($_POST) > 0) {
    echo "
      <script>
        alert('Data berhasil diedit!');
        document.location.href = '../index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Data gagal diedit!');
        document.location.href = '../index.php';
      </script>
    ";
  };

 };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
     <br><br>
 <div class="container">

 <form class="border p-5 shadow-sm rounded w-50 mx-auto" action="" method="post" enctype="multipart/form-data" >
  <fieldset >

  <h3 class="text-center my-5">Edit Data Barang</h3>

  <input type="hidden" name="gambarLama" value="<?= $data["Gambar"] ?>">
   

    <div class="mb-3">
      <label for="kodebarang" class="form-label">Kode Barang</label>
      <input type="text" name="Kode_Barang" id="kodebarang" class="form-control" placeholder="Masukan Kode Barang" required
        value="<?= $data["Kode_Barang"];?>">
    </div>

    <div class="mb-3">
      <label for="Gambar" class="form-label d-block">Gambar</label>
      <img src="../asset/<?= $data["Gambar"]; ?>" width="100">
      <div class=" ">
      <input type="file" name="Gambar" id="Gambar" class="">
      </div>
    </div>

    <div class="mb-3">
      <label for="namabarang" class="form-label">Nama Barang</label>
      <input type="text" name="Nama_Barang" id="namabarang" class="form-control" placeholder=" Masukan Nama Barang" required
       value="<?= $data["Nama_Barang"];?>">
    </div>

    <div class="mb-3 my-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="text" name="Harga" id="harga" class="form-control" placeholder="Masukan Harga" required
       value="<?= $data["Harga"];?>">
    </div>

    <div class="mb-3">
      <label for="jumlahbarang" class="form-label">Jumlah Barang</label>
      <input type="text" name="Jumlah_Barang" id="jumlahbarang" class="form-control" placeholder="Masukan Jumlah Barang" required
       value="<?= $data["Jumlah_Barang"];?>">
    </div>
      
    <h5>Jenis Barang</h5>
    <select class="form-select" aria-label="Default select example" name="Jenis_Barang" id="Jenis_Barang" required >
           <option value="Makanan" name="Jenis_Barang" <?php if ($data['Jenis_Barang'] == "Makanan") echo 'selected="selected"'; ?> >Makanan</option>
           <option value="Minuman" name="Jenis_Barang" <?php if ($data['Jenis_Barang'] == "Minuman") echo 'selected="selected"'; ?> >Minuman</option>
   </select>
      <br>
    <div class="mb-3">
      <label for="merk" class="form-label">Merk</label>
      <input type="text" name="Merk" id="merk" class="form-control" placeholder="Masukan Merk" required
       value="<?= $data["Merk"];?>">
    </div>
    <!-- Tombol Tambah | Kembali -->
    <div class="d-flex justify-content-evenly gap-3">
    <button class="btn btn-sm btn-warning my-3 w-50"><a href="../index.php" class="text-dark text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 19 19">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
</svg> Kembali </a>
     </button>

    <button type="submit" class="btn btn-success my-3 w-50" name="submit" id="submit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 18 18">
     <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
       <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
         </svg> Edit </button>
    </div>
  </fieldset>
</form>
 </div>
    
</body>
</html>