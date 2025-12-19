<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/koneksi.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];


    $get = mysqli_query($conn, "SELECT gambar FROM produk WHERE id = '$id'");
    $data = mysqli_fetch_assoc($get);

    if ($data) {
        $file = "../../assets/img/" . $data['gambar'];
        if (file_exists($file)) {
            unlink($file); 
        }
    }


    $query = "DELETE FROM produk WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: produk.php");
        exit();
    } else {
        header("Location: produk.php");
        exit();
    }

} else {
    header("Location: produk.php");
    exit();
}
?>
