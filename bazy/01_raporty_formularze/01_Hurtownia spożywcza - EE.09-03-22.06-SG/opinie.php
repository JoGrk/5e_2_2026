<?php
$link = new mysqli('localhost', 'root', '', '5e_2_hurtownia');

$sql = "SELECT zdjecie, imie, opinia
        FROM klienci
        INNER JOIN opinie ON klienci.id = opinie.Klienci_id
        WHERE typy_id IN (2,3);";

$result = $link -> query($sql);
$reviews = $result -> fetch_all(1);

$sql = "SELECT imie, nazwisko, punkty
        FROM Klienci
        ORDER BY punkty desc
        LIMIT 3;";
$result = $link -> query($sql);
$points = $result -> fetch_all(1);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>Hurtownia spożywcza</h1>
    </header>
    <main>
        <h2>Opinie naszych klientów</h2>
        <?php 
            foreach($reviews as $review){
                echo"
                    <div class='review'>
                        <img src='{$review['zdjecie']}' alt='klient'>
                        <blockquote>{$review['opinia']}</blockquote>
                        <h4>{$review['imie']}</h4>
                    </div>
                ";
        }
        
        ?>
        
    </main>
    <footer>
        <section class="first">
            <h3>Współpracują z nami</h3>
            <a href="http://sklep.pl">Sklep 1</a>
        </section>

        <section class="second">
            <h3>Nasi top klienci</h3>
            <ol>
                <!-- <li>[imie] [nazwisko], [punkty] pkt.</li> -->
                <!-- skrypt2 -->

                <?php
                    foreach($points as $point){
                        echo"
                        <li>{$point['imie']} {$point['nazwisko']}, {$point['punkty']} pkt.</li>
                        ";
                    }
                ?>
            </ol>
        </section>

        <section class="third">
            <h3>Skontaktuj się</h3>
            <p>telefon: 111222333</p>
        </section>

        <section class="fourth">
            <h3>Autor: 000000000000</h3>
        </section>
    </footer>

</body>
</html>

<?php
$link -> close();
?>