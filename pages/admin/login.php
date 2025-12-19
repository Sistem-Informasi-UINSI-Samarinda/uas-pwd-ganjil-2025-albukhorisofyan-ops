<?php 
session_start();
include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/css/adminlogin.css">
    

</head>
<body>

  <main class="login">
    <div class="admin">
        <h2>Selamat datang Admin</h2> 
        <p>Masukkan password jika Benar Admin!</p>
    </div>
        <form method="post" action=""><br> 
        <input type="text" name="username" placeholder="Masukkan Username Email" required> <br> <br>
        <input type="password" name="password" placeholder="Masukkan Password" required> <br>
        <br>

        <button type="submit" name="login">Login</button>

            <?php 
    if(isset($_POST['login'])){
        $input = $_POST['username'];
        $password = $_POST['password'];

        // Cek Input ke database apakah sudah sesuai atau belum dengan data yg ada
        if(filter_var($input, FILTER_VALIDATE_EMAIL)){
            $query = "SELECT * FROM users WHERE email ='$input'";
        } else {
            $query = "SELECT * FROM users WHERE username ='$input'";
        }

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])){
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
                $_SESSION['username'] = $row['username'];

                // arahkan ke admin
                header("Location: dashboard.php");
                exit();
            }
            else {
                echo "<p style='color: red'> Password Salah</p>";
            }
        }
        else{
            echo "<p style='color: red'> Username/email tidak sesuai</p>";
        }
    }
    ?>
    </form>
    
  </main>

</body>
</html>

</body>
</html>