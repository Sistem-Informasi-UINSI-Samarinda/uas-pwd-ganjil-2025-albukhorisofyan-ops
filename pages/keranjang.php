<?php
session_start();
$page_css = '../assets/css/keranjang.css';
include '../includes/meta.php';
include '../includes/header.php';
include '../config/koneksi.php'; 

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Silahkan login terlebih dahulu'); 
          window.location='login.php'</script>";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id_produk'])) {

    $id_produk = $_POST['id_produk'];
    $id_user   = $_SESSION['user_id'];

    
    $cek = mysqli_query($conn, 
        "SELECT * FROM keranjang WHERE id_produk='$id_produk' AND id_user='$id_user'"
    );

    if (mysqli_num_rows($cek) > 0) {
        mysqli_query($conn,
            "UPDATE keranjang 
             SET jumlah = jumlah + 1 
             WHERE id_produk='$id_produk' AND id_user='$id_user'"
        );
    } else {
        mysqli_query($conn,
            "INSERT INTO keranjang(id_user, id_produk, jumlah)
             VALUES ('$id_user', '$id_produk', 1)"
        );
    }

    header("Location: keranjang.php");
    exit;
}


$data = mysqli_query($conn,
    "SELECT keranjang.*, produk.nama, produk.harga, produk.gambar
     FROM keranjang 
     JOIN produk ON keranjang.id_produk = produk.id
     WHERE keranjang.id_user = '$_SESSION[user_id]'"
);
?>

<div class="container-keranjang">
    <h2>Keranjang Belanja</h2>

    <table class="keranjang-table">
        <tr>
            <th>Gambar</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>

    <?php 
        $total_semua = 0;
        while ($row = mysqli_fetch_assoc($data)) { 
        $subtotal = $row['harga'] * $row['jumlah'];
        $total_semua += $subtotal;
    ?>
        <tr>
            <td><img src="../assets/img/<?= $row['gambar']; ?>" class="foto"></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td>Rp <?= number_format($row['harga']); ?></td>
            <td>Rp <?= number_format($row['harga'] * $row['jumlah']); ?></td>
            <td>
                <a href="keranjang_hapus.php?id=<?= $row['id']; ?>" 
                   class="hapus"
                   onclick="return confirm('Hapus dari keranjang?')">
                    Hapus
                </a>
                    |
                <a href="keranjang_edit.php?id=<?= $row['id']; ?>" class="edit">
                    Edit
                </a>

            </td>
        </tr>
        <?php } ?>

    </table>
</div>

<div class="total">
    <h3>Total: <span>Rp <?= number_format($total_semua); ?></span></h3>

    <form action="shop.php" method="POST">
        <input type="hidden" name="total_bayar" value="<?= $total_semua; ?>">
        <button type="submit" class="checkout">Checkout</button>
    </form>
</div>

