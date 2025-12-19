<?php
session_start();

if (isset($_SESSION['user_id']) && !isset($_SESSION['welcome_shown'])) {
    $nama = $_SESSION['nama_lengkap'];
    echo "<script>alert('Selamat datang $nama');</script>";
    $_SESSION['welcome_shown'] = true;
}
?>

<?php $page_css = 'assets/css/Beranda.css'; ?>
<?php include 'includes/meta.php'; ?>
<?php include 'includes/header.php'; ?>


    <main>
        <section class="section-1">
            <div class="text-hero" >
                <h2>REAL MADRID</h2>
                <h3>FOOTBALL CLUB</h3>
                <div class="gris"></div>
                <small>King Of Europe</small>
            </div>
            <div class="penjelasan">
                Real Madrid Club de Fútbol adalah klub sepak bola profesional yang berbasis di Madrid, Spanyol. <br>
                Klub ini berkompetisi di La Liga, tingkat teratas sepak bola Spanyol.</p>
                <div class="read">
                    <a href="https://id.wikipedia.org/wiki/Real_Madrid_C.F.">READ MORE ></a>
                </div>
            </div>
        </section>


        <section class="section-2">
            <div class="last-match">
                <div class="colom">
                    <p>
                        <a
                            href="https://www.bing.com/sportsdetails?q=Real%20Madrid%20vs%20Villarreal&gameid=SportRadar_Soccer_SpainLaLiga_2025_Game_61624084&league=Soccer_SpainLaLiga&scenario=GameCenter&intent=Game&iscelebratedgame=False&sport=Soccer&TimezoneId=Singapore%20Standard%20Time&IANATimezoneId=Asia/Makassar&ISOTimezoneKey=WITA&seasonyear=2025&team=SportRadar_Soccer_SpainLaLiga_2025_Team_2829&team2=SportRadar_Soccer_SpainLaLiga_2025_Team_2819&venueid={%22id%22:%22SportRadar_Soccer_SpainLaLiga_2025_Venue_754%22}:version-1&segment=sports&isl2=true&">
                            <img src="assets/img/logo.webp" alt="">
                            3 - 1
                            <img src="assets/img/villareal.webp" alt="">
                        </a><br>
                        <small>
                            5 Oktober, 2025
                        </small>
                    </p>
                </div>
                <div class="colom">
                    <p>
                        <a
                            href="https://www.bing.com/sportsdetails?q=Kairat%20Almaty%20vs%20Real%20Madrid&gameid=SportRadar_Soccer_InternationalClubsUEFAChampionsLeague_2025_Game_63369731&league=Soccer_InternationalClubsUEFAChampionsLeague&scenario=GameCenter&intent=Game&iscelebratedgame=False&sport=Soccer&TimezoneId=Singapore%20Standard%20Time&IANATimezoneId=Asia/Makassar&ISOTimezoneKey=WITA&seasonyear=2025&team=SportRadar_Soccer_InternationalClubsUEFAChampionsLeague_2025_Team_5172&team2=SportRadar_Soccer_InternationalClubsUEFAChampionsLeague_2025_Team_2829&venueid={%22id%22:%22SportRadar_Soccer_InternationalClubsUEFAChampionsLeague_2025_Venue_952%22}:version-1&segment=sports&isl2=true&">
                            <img src="assets/img/logo.webp" alt="">
                            5 - 1
                            <img src="assets/img/kairat.webp" alt="">
                        </a><br>
                        <small>
                            1 Oktober, 2025
                        </small>
                    </p>
                </div>
                <div class="colom">
                    <p>
                        <a
                            href="https://www.bing.com/sportsdetails?q=Atletico%20Madrid%20vs%20Real%20Madrid&gameid=SportRadar_Soccer_SpainLaLiga_2025_Game_61624058&league=Soccer_SpainLaLiga&scenario=GameCenter&intent=Game&iscelebratedgame=False&sport=Soccer&TimezoneId=Singapore%20Standard%20Time&IANATimezoneId=Asia/Makassar&ISOTimezoneKey=WITA&seasonyear=2025&team=SportRadar_Soccer_SpainLaLiga_2025_Team_2836&team2=SportRadar_Soccer_SpainLaLiga_2025_Team_2829&venueid={%22id%22:%22SportRadar_Soccer_SpainLaLiga_2025_Venue_21414%22}:version-1&segment=sports&isl2=true&">
                            <img src="assets/img/logo.webp" alt="">
                            2 - 5
                            <img src="assets/img/atm.webp" alt="">
                        </a> <br>
                        <small>
                            27 September, 2025
                        </small>
                    </p>
                </div>
                <div class="result">
                    <h2>RESULT</h2>
                    <h3>THE LAST <br>
                        MATCH
                    </h3>
                </div>

            </div>
        </section>

        <div class="container">
            <h2>Stadium <br>
                Santiago Bernabeu</h2>
            <p>Trofi<br>
                1 Club Century Fifa <br>
                13 Spanish Super Cup <br>
                36 Laliga <br>
                20 CDR <br>
                15 UCL <br>
                8 CWC<br>
                2 UEL<br>
                5 USC
            </p>
        </div>
    </main>


<?php include 'includes/footer.php'; ?>
