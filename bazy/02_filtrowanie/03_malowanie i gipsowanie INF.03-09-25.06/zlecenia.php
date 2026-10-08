<?php
    $link = new mysqli('localhost','root','','5e_2_remonty');
$workers_f = $_POST['workers']??NULL;
$city_f = $_POST['city']??NULL
$services_f = $_POST['service']??NULL

if($workers_f){
    $sql = "SELECT nazwa_firmy, liczba_pracownikow
            FROM wykonawcy
            WHERE liczba_pracownikow >= $workers_f;";
    $result = $link -> query($sql);
    $companies = $result -> fetch_all(1);
}

if($city_f && $services_f){
    $sql = "SELECT imie, cena
            FROM  klienci
                INNER JOIN zlecenia USING(id_klienta)
            WHERE miasto = '$city_f' and rodzaj='$services_f';";
}

$sql="SELECT DISTINCT miasto
FROM klienci
ORDER BY miasto;";
$result=$link->query($sql);
$cities=$result->fetch_all(1);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Malowanie i Gipsowanie</h1>
    </header>

    <main>
        <nav>
            <a href="kontakt.html">kontakt</a>
            <a href="https://remonty.pl" target="_blank">Partnerzy</a>
        </nav>
        <aside> 
            <img src="tapeta_lewa.png" alt="usługi">
            <img src="tepeta_prawa.png" alt="usługi">
            <img src="tapeta_lewa.png" alt="usługi">
        </aside>
        <section class="left">
            <h2>Dla klientów</h2>

            <form action="" method="post">
                <label for="workers">Ilu co najmniej pracownikow potrzebujesz</label>
                <input type="number" name="workers" id="workers" step='1' min='0'>

                <button>Szukaj firmy</button>
            </form>
            <!-- skrypt1 -->
             <!-- <p>nazwa_firmy liczba_pracownikow pracowników</p> -->
             <?php

                if($workers_f){
                    foreach($companies as $company){
                    echo"
                    <p>{$company['nazwa_firmy']} {$company['liczba_pracownikow']} pracowników</p>
                    ";
                }
                }
             
             ?>
        </section>
        <section class="center">
            <h2>Dla wykonawców</h2>
            <form action="" method="post">
                <select name='city' id='city'>
                    
                    <!-- skrypt 2 -->
                     <?php
                        foreach($cities as $city){
                            echo"<option>{$city['miasto']}</option>";
                        }
                     ?>
                </select><br>
                <input type="radio" name="service" id="painting" value='malowanie' checked>
                <label for="painting">Malowanie</label>
                <input type="radio" name="service" id="gipsing" value='gipsowanie'>
                <label for="gipsing">Gipsowanie</label>
                <button>Szukaj klientów</button>
            </form>
            <ul>
                <!-- skrypt3 -->
            </ul>
        </section>
    </main>
    <footer>
        <p><strong>strone wykonal: 05783470594</strong></p>
    </footer>
    
</body>
</html>
<?php
$link->close();
?>