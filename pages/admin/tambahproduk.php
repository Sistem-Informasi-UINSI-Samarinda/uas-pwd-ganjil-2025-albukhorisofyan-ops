<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="../../assets/css/adminStyles.css">
</head>
<body>
    <div class="sidebar">
    <div class="logo">
        <img src="/UAS/assets/img/logo.webp">
        <h2>RMA<br>FC</h2>
    </div>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="produk.php">Produk</a></li>
        <li><a href="../../index.php">Kembali ke Beranda</a></li>
        <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
    </div>
    
<main class="tambahproduk">
    <h2>Tambah Produk</h2>
<form method="POST" enctype="multipart/form-data">
    <label>Nama Produk</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Harga</label><br>
    <input type="number" name="harga" required><br><br>

    <label>Gambar</label><br>
    <input type="file" name="gambar" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>
</main>


<?php
if (isset($_POST['simpan'])) {

    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];

    $foto = $_FILES['gambar']['name'];
    $tmp  = $_FILES['gambar']['tmp_name'];

    $folder = "../../assets/img/";
    $nama_file = uniqid() . "_" . $foto;

    move_uploaded_file($tmp, $folder . $nama_file);

    $query = "INSERT INTO produk (nama, harga, gambar)
              VALUES ('$nama', '$harga', '$nama_file')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Produk berhasil ditambahkan');
                window.location='produk.php';
              </script>";
    } else {
        echo "Gagal menyimpan produk";
    }
}
?>

</body>
</html>
