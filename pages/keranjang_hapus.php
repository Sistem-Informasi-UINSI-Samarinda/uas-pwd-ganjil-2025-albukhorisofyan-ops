<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $id_user = $_SESSION['user_id'];

    $query = "DELETE FROM keranjang WHERE id = '$id' AND id_user = '$id_user'";

    if(mysqli_query($conn, $query)){
        header("Location: keranjang.php");
        exit;
    } else {
        header("Location: keranjang.php");
        exit;
    }

} else {
    header("Location: keranjang.php");
    exit;
}
?>
