<?php
$link = new mysqli('localhost','root','','5e_2_antyki');

$order_f = $_POST['btnCategory']??null;
if($order_f){
    $sql ="INSERT INTO zakupy (idKlienci,idMeble,sztuk)
            VALUES(1,$order_f,1);";
    $result = $link -> query($sql);
    header('location: index.php');
}

$sql="SELECT idMeble, nazwa, plik, styl, cena, opis
        FROM meble
        WHERE kategoria = 1;";
$result =$link->query($sql);
$furnitures_1a=$result->fetch_all(1);

$sql="SELECT idMeble, nazwa, plik, styl, cena, opis
        FROM meble
        WHERE kategoria = 2;";
$result =$link->query($sql);
$furnitures_1b=$result->fetch_all(1);

$sql="SELECT idMeble, nazwa, plik, styl, cena, opis
        FROM meble
        WHERE kategoria = 3;";
$result =$link->query($sql);
$furnitures_1c=$result->fetch_all(1);

$sql="SELECT nazwa, cena 
FROM meble
INNER JOIN Zakupy ON zakupy.idmeble = meble.IDmeble
WHERE idKlienci =1;"
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sprzedaz antykow</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Najlepsze antyki w mieście</h1>
    </header>

    <main>
        <section class="first">
            <h2>Sofy</h2>
            <!-- skrypt 1 wariant 1a -->
             <!-- <div class='mebel'>
                <div class='obraz'>
                    <img src='sofy/{plik}' alt='mebel'>
                </div>
                <div class='informacja'>
                    <h3>{nazwa}</h3>
                    <h4>{styl}</h4>
                    <h3>cena: {cena}zł</h3>
                    <form action='' method='post'>
                        <button name='btnCategory' value='{idMeble}'>KUP</button>
                    </form>
                </div>
                <div class='opis'>
                    <p>{opis}</p>
                </div>
             </div> -->

             <?php
             
             foreach($furnitures_1a as $furniture){
                echo"
                <div class='mebel'>
                    <div class='obraz'>
                        <img src='sofy/{$furniture['plik']}' alt='mebel'>
                    </div>
                    <div class='informacja'>
                        <h3>{$furniture['nazwa']}</h3>
                        <h4>{$furniture['styl']}</h4>
                        <h3>cena: {$furniture['cena']}zł</h3>
                        <form action='' method='post'>
                            <button name='btnCategory' value='{$furniture['idMeble']}'>KUP</button>
                        </form>
                    </div>
                    <div class='opis'>
                        <p>{$furniture['opis']}</p>
                    </div>
                </div>
                ";
             }
             
             ?>

            <h2>Fotele</h2>
            <!-- skrypt 1 wariant 1b -->
             <?php
             
             foreach($furnitures_1b as $furniture){
                echo"
                <div class='mebel'>
                    <div class='obraz'>
                        <img src='fotele/{$furniture['plik']}' alt='mebel'>
                    </div>
                    <div class='informacja'>
                        <h3>{$furniture['nazwa']}</h3>
                        <h4>{$furniture['styl']}</h4>
                        <h3>cena: {$furniture['cena']}zł</h3>
                        <form action='' method='post'>
                            <button name='btnCategory' value='{$furniture['idMeble']}'>KUP</button>
                        </form>
                    </div>
                    <div class='opis'>
                        <p>{$furniture['opis']}</p>
                    </div>
                </div>
                ";
             }
             
             ?>

            <h2>Komody</h2>
            <!-- skrypt 1 wariant 1c -->
                <?php
             
             foreach($furnitures_1c as $furniture){
                echo"
                <div class='mebel'>
                    <div class='obraz'>
                        <img src='komody/{$furniture['plik']}' alt='mebel'>
                    </div>
                    <div class='informacja'>
                        <h3>{$furniture['nazwa']}</h3>
                        <h4>{$furniture['styl']}</h4>
                        <h3>cena: {$furniture['cena']}zł</h3>
                        <form action='' method='post'>
                            <button name='btnCategory' value='{$furniture['idMeble']}'>KUP</button>
                        </form>
                    </div>
                    <div class='opis'>
                        <p>{$furniture['opis']}</p>
                    </div>
                </div>
                ";
             }
             
             ?>

            <!-- skrypt 2 -->
             
              
            
        </section>

        <aside>
            <h2>Koszyk</h2>
            <p>Zalogowano: Anna Kowalska</p>
            <!-- skrypt3 -->
            
        </aside>
    </main>

    <footer>
        <p>Stronę wykonał: 0000000000</p>
    </footer>
</body>
</html>
<?php
$link->close();
?>