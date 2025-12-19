<?php 
session_start();
include '../config/koneksi.php';
?>

<?php $page_css = '../assets/css/Madridista.css'; ?>
<?php include '../includes/meta.php'; ?>
<?php include '../includes/header.php'; ?>

   <main class="contact">
        <div class="container-1">
            <h2>MADRIDISTA</h2>
            <p>Ayo Login dan Buka Fitur Membeli </p>
        </div>
            <form class="container-2" method="post" action="">
                <input type="text" name="username" placeholder="Masukkan username email">
                <input type="password" name="password" placeholder="Masukkan Password">
                <button type="submit" name="login">VAMOS!!</button>
            </form>
               <li class="buat">
                belum punya akun? <a href="#">buat!</a>
               </li>

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
                header("Location: /UAS/index.php");
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
   </main>


   


<?php include '../includes/footer.php'; ?>