<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/koneksi.php';
$page_css = '../assets/css/editkeranjang.css';
include '../includes/header.php';
include '../includes/meta.php';

// Cek id keranjang
if(isset($_GET['id'])){
    $id_keranjang = $_GET['id'];
    $result = mysqli_query($conn, 
        "SELECT keranjang.*, produk.nama, produk.harga 
         FROM keranjang 
         JOIN produk ON keranjang.id_produk = produk.id 
         WHERE keranjang.id='$id_keranjang' AND keranjang.id_user='$_SESSION[user_id]'"
    );
    $row = mysqli_fetch_assoc($result);
    if(!$row){
        echo "<script>
        alert('Data tidak ditemukan'); 
        window.location.href='keranjang.php';
        </script>";
        exit();
    }
} else {
    echo "<script>
    alert('ID keranjang tidak ditemukan'); 
    window.location.href='keranjang.php';
    </script>";
    exit();
}

// Proses simpan update jumlah
if(isset($_POST['simpan'])){
    $jumlah = $_POST['jumlah'];

    if(is_numeric($jumlah) && $jumlah > 0){
        $query = "UPDATE keranjang SET jumlah='$jumlah' WHERE id='$id_keranjang'";
        if(mysqli_query($conn, $query)){
            header("Location: keranjang.php");
            exit();
        } else {
            $error = "Gagal update data: ". mysqli_error($conn);
        }
    } else {
        $error = "Jumlah harus berupa angka lebih dari 0";
    }
}
?>

<div class="container">
    <h2> <?= $row['nama']; ?></h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form action="" method="post">
        <button type="button" class="kurang" onclick="ubahJumlah(-1)">-</button>
        <input type="number" name="jumlah" id="jumlah" value="<?= $row['jumlah']; ?>" min="1" class="nomor">
        <button type="button" class="tambah" onclick="ubahJumlah(1)">+</button>
        <br><br>
        <button type="submit" name="simpan" class="simpan">Simpan</button>
    </form>

    <p class="kembali"><a href="keranjang.php">Kembali ke Keranjang</a></p>
</div>

<script>
function ubahJumlah(nilai) {
    let input = document.getElementById('jumlah');
    let jumlahBaru = parseInt(input.value) + nilai;
    if(jumlahBaru < 1) jumlahBaru = 1;
    input.value = jumlahBaru;
}
</script>