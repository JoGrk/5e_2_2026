<?php
    $link = new mysqli('localhost','root','','5e_2_matura');

    $first_name_G = $_GET['first-name'] ?? NULL;
    $last_name_G = $_GET['last-name'] ?? NULL;
    $id_G = $_GET['id'] ?? NULL;

    if($first_name_G && $last_name_G && $id_G){
        $sql = "SELECT rok, sesja, przedmiot, punkty
                FROM arkusz
                    INNER JOIN wynik USING(symbol)
                WHERE maturzysta_id = $id_G;";
        $result = $link -> query($sql);
        $marks = $result -> fetch_all(1);
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matura</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>System informacji dla maturzystow</h1>
    </header>
    <aside>
        <img src="ma.jpg" alt="matura">
        <img src="tu.jpg" alt="matura">
        <img src="ra.jpg" alt="matura">
        </aside>


        <section class="one">
            <!-- skrypt3 -->
             <?php
             if($first_name_G && $last_name_G && $id_G){
                echo"$first_name_G $last_name_G";
            foreach($marks as $mark){
                echo"<h3>{$mark['rok']} {$mark['sesja']} </h3>"
            }
             ?>
             <!-- SELECT rok, sesja, przedmiot, punkty -->
        </section>


    <section class="two">
        <div class="exam">
            <h4>Przedmioty</h4>
            <!-- skrypt1 -->
        </div>
        <div class="exam">
            <h4>Lata</h4>
            <!-- skrypt1 -->
        </div>
        <div class="exam">
            <h4>Najlepszy wynik</h4>
            <!-- skrypt1 -->
    </div>
        <div class="exam">
            <h4>Najgorszy wynik</h4>
            <!-- skrypt1 -->
        </div>
    </section>
    <footer>Stronye wykonał: verity</footer>
</body>
</html>

<?php
    $link -> close();
?>