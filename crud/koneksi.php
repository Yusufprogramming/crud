<?php

$conn = mysqli_connect("localhost","root","","");



function query($databarang) {
    global $conn;
    $hasil = mysqli_query($conn, $databarang);
    $penampungan = [];
    while ($data = mysqli_fetch_assoc($hasil)) {
        $penampungan[] = $data;
    }
    return $penampungan;
}

function tambah($data) {
    global $conn;
  
    $kodebarang = htmlspecialchars($data["Kode_Barang"]);
    $namabarang = htmlspecialchars($data["Nama_Barang"]);
    $harga = htmlspecialchars($data["Harga"]);
    $jumlahbarang = htmlspecialchars($data["Jumlah_Barang"]);
    $jenisbarang = htmlspecialchars($data["Jenis_Barang"]);
    $merk = htmlspecialchars($data["Merk"]);

    $Gambar = upload();
    if (!$Gambar) {
       return false;
    }


  $tambah ="INSERT INTO tabel_barang (Kode_Barang, Gambar ,Nama_Barang, Harga, Jumlah_Barang, Jenis_Barang,Merk)
  VALUES ('$kodebarang','$Gambar','$namabarang','$harga','$jumlahbarang','$jenisbarang','$merk')";
  mysqli_query($conn, $tambah);

 return mysqli_affected_rows($conn);

}

function upload() {
  $namaFile = $_FILES['Gambar']['name'];
  $ukuranfile = $_FILES['Gambar']['size'];
  $error = $_FILES['Gambar']['error'];
  $tmpName = $_FILES['Gambar']['tmp_name'];


// Cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
     echo " <script>
          alert('Pilih gambar terlebih dahulu!');
       </script>
     ";
     return false;
  }
 
  // Cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg','jpeg','png'];
  $ekstensiGambar = explode('.',$namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo " <script>
          alert('Yang anda upload bukan gambar!');
         </script>
     ";
     return false;
  }

// Cek jika ukurannya terlalu besar
if ($ukuranfile > 100000000) {
  echo " <script>
          alert('Ukuran gambar terlalu besar!');
        </script>
      ";
  return false;
}

// Generate name gambar baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;


// Lolos pengecekan, gambar siap di upload
  move_uploaded_file($tmpName, '../asset/'.$namaFileBaru);
  return $namaFileBaru;
}
  

function hapus($data) {
    global $conn;
    $hapus = ("DELETE FROM tabel_barang WHERE Kode_Barang = '$data'");
    mysqli_query($conn, $hapus);
    
    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;

    $kodebarang = htmlspecialchars($data["Kode_Barang"]);
    $namabarang = htmlspecialchars($data["Nama_Barang"]);
    $harga = htmlspecialchars($data["Harga"]);
    $jumlahbarang = htmlspecialchars($data["Jumlah_Barang"]);
    $jenisbarang = htmlspecialchars($data["Jenis_Barang"]);
    $merk = htmlspecialchars($data["Merk"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

   // cek apakah user pilih gambar baru atau tidak
   if ($_FILES['Gambar']['error'] === 4 ) {
      $Gambar = $gambarLama;
   } else {
    $Gambar = upload(); 
   }
    
  $edit ="UPDATE tabel_barang SET 
             Kode_Barang = '$kodebarang',
             Gambar = '$Gambar',
             Nama_Barang = '$namabarang',
             Harga = '$harga',
             Jumlah_Barang = '$jumlahbarang',
             Jenis_Barang = '$jenisbarang',
             Merk = '$merk'
           WHERE Kode_Barang = $kodebarang
          ";
  mysqli_query($conn,$edit);
 return mysqli_affected_rows($conn);
}

function cari($keyword){
   $read = "SELECT * FROM tabel_barang
     WHERE 
    Kode_Barang LIKE '%$keyword%' OR
    Nama_Barang LIKE '%$keyword%' OR
    Harga LIKE '%$keyword%' OR
    Jumlah_Barang LIKE '%$keyword%' OR
    Jenis_Barang LIKE '%$keyword%' OR
    Merk LIKE '%$keyword%'
   ";
   return query($read);
}


function daftar($data) {
  global $conn;

  $namaPengguna = strtolower(stripslashes($data["pengguna"]));
  $kataSandi = mysqli_real_escape_string($conn, $data["katasandi"]);
  $kataSandi2 = mysqli_real_escape_string($conn, $data["katasandi2"]);
  
// Cek Nama pengguna sudah ada apa belum
$hasil = mysqli_query($conn, "SELECT nama_pengguna FROM pengguna WHERE nama_pengguna = '$namaPengguna'");
if (mysqli_fetch_assoc($hasil)) {
  echo "<script>
  alert('Nama Pengguna Sudah Terdaftar!');
  </script>";
  return false;
}

 // Cek konfirmasi kata sandi
 if ($kataSandi !== $kataSandi2) {
  echo "<script>
  alert('Konfirmasi Kata Sandi Tidak Sesuai!');
  </script>";
  return false;
}

 // Enkripsi Kata sandi
 $kataSandi = password_hash($kataSandi, PASSWORD_DEFAULT);

 // Tambahkan Pengguna Baru ke Database
 mysqli_query($conn, "INSERT INTO pengguna VALUES('', '$namaPengguna','$kataSandi')");

 return mysqli_affected_rows($conn);
}
?>