<?php
    $link = new mysqli('localhost','root','','5e_2_matura');

    $sql ="SELECT DISTINCT przedmiot
            FROM arkusz;";
    $result = $link ->query($sql);
    $subjects = $result -> fetch_all(1); 

    $sql = "SELECT min(rok) as najstarszy, max(rok) as najmlodszy
            from arkusz;";
    $result = $link -> query($sql);
    $years = $result -> fetch_assoc();

    $sql = "SELECT maturzysta_id, round(avg(punkty),2) as wynik
            from wynik
            group by maturzysta_id 
            order by wynik desc
            limit 1;";
    $result = $link -> query($sql);
    $best = $result -> fetch_assoc();

    $sql = "SELECT maturzysta_id, round(avg(punkty),2) as wynik
            from wynik
            group by maturzysta_id 
            order by wynik ASC
            limit 1;";

    $result = $link -> query($sql);
    $worst = $result -> fetch_assoc();

    $sql = "SELECT id, imie, nazwisko
            FROM maturzysta
            WHERE szkola = 'T3'
            ORDER BY nazwisko;";
    $result = $link -> query($sql);
    $students = $result -> fetch_all(1);

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
            <h3>Wybierz ucznia z listy</h3>
            <!-- skrypt2 -->
            <!-- <a href='wynik.php?id={id}&first-name={imie}&last-name={nazwisko}'>
                {id}.{imie} {nazwisko}
            </a><br> -->
            <?php
                foreach($students as $student){
                  echo"  <a href='wynik.php?id={$student['id']}&first-name={$student['imie']}&last-name={$student['nazwisko']}'>
                {$student['id']}.{$student['imie']} {$student['nazwisko']}
            </a><br>";
                }
            ?>
        </section>


    <section class="two">
        <div class="exam">
            <h4>Przedmioty</h4>
            <!-- skrypt1 -->

             <?php
                foreach($subjects as $subject){
                    echo"{$subject['przedmiot']} ";
                }
             ?>
        </div>
        <div class="exam">
            <h4>Lata</h4>
            <?php
                echo" {$years['najmlodszy']} - {$years['najstarszy']}";
            ?>
        </div>
        <div class="exam">
            <h4>Najlepszy wynik</h4>
            <!-- skrypt1 -->
             <!-- SELECT maturzysta_id, round(avg(punkty),2) as wynik -->
             <?php
                echo"{$best['wynik']}";
             ?>
    </div>
        <div class="exam">
            <h4>Najgorszy wynik</h4>
            <!-- skrypt1 -->
             <?php
                echo"{$worst['wynik']}";
             ?>
        </div>
    </section>
    <footer>Stronye wykonał: verity</footer>
</body>
</html>

<?php
    $link -> close();
?>