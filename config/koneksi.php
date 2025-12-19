<?php

$servername = "localhost";
$username = "root";
$password = "";
$database =  "uas_pwd_2441919048";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Koneksi Gagal: ". mysqli_connect_error());
}


?>