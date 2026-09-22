<?php

$link = new mysqli('localhost', 'root', '', '5e_2_auta');

$brand_f = $_POST['brand']??NULL;
if($brand_f){
    $sql = "SELECT model, cena, zdjecie,nazwa
            FROM samochody
                INNER JOIN marki ON marki.id = samochody.marki_id
            WHERE nazwa = '$brand_f';";
    $result = $link -> query($sql);
    $brand_cars = $result -> fetch_all(1); 
}

$sql = "SELECT model, rocznik, przebieg,paliwo, cena, zdjecie
        FROM samochody
        WHERE id=10;";

$result = $link -> query($sql);
$car = $result -> fetch_assoc();

$sql ="SELECT nazwa, model, rocznik, cena, zdjecie
        FROM marki
        INNER JOIN samochody ON marki.id = samochody.marki_id
        WHERE wyrozniony = 1
        LIMIT 4;";
$result =$link -> query($sql);
$offers = $result -> fetch_all(1);

$sql = "SELECT nazwa 
        FROM marki;";
$result = $link -> query($sql);
$brands = $result -> fetch_all(1);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><em>KupAuto! </em> Internetowy Komis Samochodowy</h1>
    </header>

    <main>

        <section class="first">
            <?php
            echo"
            <img src='{$car['zdjecie']}' alt='oferta dnia'>
             <h4>Oferta dnia: Toyota {$car['model']}</h4>
             <p>Rocznik:{$car['rocznik']}, przebieg: {$car['przebieg']}, rodzaj paliwa: {$car['paliwo']}</p>
             <h4>Cena: {$car['cena']}</h4>
             "
            ?>
            <!-- efekt działania skryptu 1 -->
             <!-- <img src='{zdjecie}' alt='oferta dnia'>
             <h4>Oferta dnia: Toyota {model}</h4>
             <p>Rocznik:{rocznik}, przebieg: {przebieg}, rodzaj paliwa: {paliwo}</p>
             <h4>Cena: {cena}</h4> -->

        </section>

        <section class="second">
            <h2>Oferty Wyróżnione</h2>
            <!-- efekt działania skryptu 2 -->
            <div class="fleks">
                <?php
                    foreach($offers as $offer){
                        echo"
                            <div class='offer'>
                                <img src='{$offer['zdjecie']}' alt='model'>
                                <h4>{$offer['nazwa']}, {$offer['model']}</h4>
                                <p>Rocznik:{$offer['rocznik']}</p>
                                <h4>Cena:{$offer['cena']}</h4>
                            </div> 
                        ";
                    };
                ?>
            </div>
        </section>
        <section class="third">
            <h2>Wybierz markę</h2>
            <form action="" method="post">
                <select name="brand" id="brand">
                      <!-- efekt działania skryptu 3 -->
                       <?php
                            foreach($brands as $brand){
                                echo"<option>{$brand['nazwa']}</option>";
                            }
                       ?>
                    <!-- <option>{$brand['nazwa']}</option> -->
                </select>
                <button>Wyszukaj</button>
                  <!-- efekt działania skryptu 4 -->
                <div class="fleks">
                    <?php
                        if($brand_f){
                            foreach($brand_cars as $offer){
                                echo"
                                    <div class='offer'>
                                        <img src='{$offer['zdjecie']}' alt='model'>
                                        <h4>{$offer['nazwa']}, {$offer['model']}</h4>
                                        <h4>Cena:{$offer['cena']}</h4>
                                    </div> 
                                    ";
                                };
                        }
                    ?>
                </div>
                
          


            </form>
        </section>
    </main>
    <footer> 
        <p>Strone wykonał;00000000</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
   
</body>
</html>

<?php

$link -> close()

?>