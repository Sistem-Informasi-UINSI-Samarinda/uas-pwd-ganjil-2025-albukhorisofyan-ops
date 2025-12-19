<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <div class="logo"><img src="/UAS/assets/img/logo.webp" alt="">
        <h1>RMA FC</h1>
    </div>

    <nav>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="hamburger"><i class="fa-solid fa-bars"></i></label>
        <ul>
            <li><a href="/UAS/index.php"> Beranda</a></li>
            <li><a href="/UAS/pages/Shop.php"> Shop</a></li>
            <li><a href="/UAS/pages/Pemain.php"> Pemain</a></li>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<li><a href="/UAS/pages/logout.php" class="logout">Log out</a></li>';
            } else {
                echo '<li><a href="/UAS/pages/Log_in.php">Log in</a></li>';
            }
            ?>

        </ul>
    </nav>
</header>
