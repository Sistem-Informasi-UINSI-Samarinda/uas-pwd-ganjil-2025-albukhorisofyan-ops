<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

include '../../config/koneksi.php';
$produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Produk</title>
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

<div class="main-content">
<header>
    <a href="tambahproduk.php" class="tambah">+ Tambah Produk</a>
</header>

<section class="cards">
<div class="card">
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; while ($row = mysqli_fetch_assoc($produk)) { ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama']; ?></td>
    <td>Rp <?= number_format($row['harga']); ?></td>
    <td>
        <img src="../../assets/img/<?= $row['gambar']; ?>" width="80">
    </td>
    <td>
        <a href="editproduk.php?id=<?= $row['id']; ?>" class="edit">Edit</a> |
        <a href="hapusproduk.php?id=<?= $row['id']; ?>"
           onclick="return confirm('Hapus produk?')" class="hapus">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>
</div>
</section>
</div>

</body>
</html>
