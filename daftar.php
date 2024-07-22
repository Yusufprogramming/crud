<?php
require 'crud/koneksi.php';

if (isset($_POST["daftar"])) {
  if (daftar($_POST) > 0) {
    echo "<script>
        alert('Nama Pengguna sudah ditambahkan!');
             document.location.href= 'masuk.php';
        </script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Daftar</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar bg-body-tertiary shadow rounded">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <h5 class="card-title p-2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-shop" viewBox="0 0 20 20">
            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
          </svg> Alfamaret</h5>
    </div>

    <a href="masuk.php"><button class="btn btn-success">Masuk</button></a>

  </nav>
  <div class="container p-5">
    <div class="card p-4 shadow-sm rounded w-50 mx-auto">
      <div class="card-body">

        <form action="" method="post">
          <div class="text-center ">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 18 18">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg>
          </div>
          <h3 class="text-center my-2"> Daftar</h3>

          <div class="mb-3 p-1">
            <label for="pengguna" class="form-label">Nama Pengguna</label>
            <input type="text" name="pengguna" id="pengguna" class="form-control" placeholder="Masukan Nama Pengguna" required>
          </div>

          <div class="mb-3 p-1">
            <label for="katasandi" class="form-label">Kata Sandi</label>
            <input type="password" name="katasandi" id="katasandi" class="form-control" placeholder="Masukan Kata Sandi" required>
          </div>

          <div class="mb-3 p-1">
            <label for="katasandi2" class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" name="katasandi2" id="katasandi2" class="form-control" placeholder="Masukan Konfirmasi Kata Sandi" required>
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-success p-8 mx-2" name="daftar"> Daftar </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-98UomMGXDV1HLECcgDZlj5tF1Pq55nrxENZ0/F4qsd5Ox4G47ZeODpSv8Kk70z6V" crossorigin="anonymous"></script>
</body>

</html>