<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM produk WHERE id = '$id'");
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<script>
            alert('Produk tidak ditemukan');
            window.location='produk.php';
        </script>";
        exit();
    }
} else {
    header("Location: produk.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
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
    
    <div class="editproduk">
    <h2>Edit Produk</h2>
        <form method="POST" enctype="multipart/form-data">

            <label>Nama Produk</label><br>
            <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br><br>

            <label>Harga</label><br>
            <input type="number" name="harga" value="<?= $data['harga']; ?>" required><br><br>

            <label>Gambar Lama</label><br>
            <img src="../../assets/img/<?= $data['gambar']; ?>" width="120"><br><br>

            <label>Ganti Gambar (opsional)</label><br>
            <input type="file" name="gambar"><br><br>

            <button type="submit" name="simpan">Simpan</button>

        </form>
</div>

<?php
if (isset($_POST['simpan'])) {

    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];

    if (!empty($_FILES['gambar']['name'])) {

        $foto = $_FILES['gambar']['name'];
        $tmp  = $_FILES['gambar']['tmp_name'];
        $folder = "../../assets/img/";

        $nama_file = uniqid() . "_" . $foto;
        move_uploaded_file($tmp, $folder . $nama_file);

        $query = "
            UPDATE produk 
            SET nama='$nama', harga='$harga', gambar='$nama_file'
            WHERE id='$id'
        ";
    } else {

        $query = "
            UPDATE produk 
            SET nama='$nama', harga='$harga'
            WHERE id='$id'
        ";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Produk berhasil diupdate');
            window.location='produk.php';
        </script>";
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

</body>
</html>
