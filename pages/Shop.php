<?php
session_start();
include '../config/koneksi.php';

$page_css = '../assets/css/Shop.css';
include '../includes/meta.php';
include '../includes/header.php';

$produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
?>

<?php if (isset($_SESSION['user_id'])) { ?>
    <div class="cart-btn">
        <a href="keranjang.php" class="keranjang-icon">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>
<?php } else { ?>
    <div class="cart-btn">
        <a href="log_in.php" onclick="alert('Anda harus login terlebih dahulu')" class="keranjang-icon">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>
<?php } ?>

<div class="model">
    <img src="../assets/img/model.webp" alt="" >
</div>

<h2>Produk Real Madrid FC</h2>

<div class="container">
<?php while ($row = mysqli_fetch_assoc($produk)) { ?>
    <div class="jersey">
        <div class="box">
            <img src="../assets/img/<?= $row['gambar']; ?>" alt="">
        </div>

        <div class="nama-jersey">
            <h3><?= $row['nama']; ?></h3>
            <p class="harga">Rp <?= number_format($row['harga']); ?></p>

            <div class="tambah">
                <?php if (!isset($_SESSION['user_id'])) { ?>
                    <button onclick="alert('Anda harus login terlebih dahulu');"
                            class="btn-belum-login">
                        Tambah
                    </button>
                <?php } else { ?>
                    <form method="post" action="keranjang.php">
                        <input type="hidden" name="id_produk" value="<?= $row['id']; ?>">
                        <button type="submit" class="keranjang">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
</div>

<?php include '../includes/footer.php'; ?>
