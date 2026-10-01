<?php
    $link = new mysqli('localhost', 'root', '', '5e_2_rzeki');

    $danger_level_f = $_POST['danger-level']??null;
    if($danger_level_f){
        if($danger_level_f == 'all'){
            $sql="SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
                    FROM wodowskazy
                        INNER JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id
                    WHERE dataPomiaru='2022-05-05';";
        }
        else if($danger_level_f == 'warning'){
            $sql="SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
                    FROM wodowskazy
                        INNER JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id
                    WHERE dataPomiaru='2022-05-05' AND stanWody> stanOstrzegawczy;";
        }
        else{
            $sql="SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
                    FROM wodowskazy
                        INNER JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id
                    WHERE dataPomiaru='2022-05-05' AND stanWody> stanAlarmowy;";
        }
        $result=$link->query($sql);
        $levels=$result->fetch_all(1);
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy Rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <div class="hd1">
            <img src="obraz1.png" alt="Mapa Polski">
        </div>

        <div class="hd2">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </div>
    </header>

    <section class="menu">
        <form action="" method="post">
            
            <input type="radio" name="danger-level" id="all" value='all'>
            <label for="all" class="danger-level" >Wszystkie</label>

            <input type="radio" name="danger-level" id="warning" value='warning'>
             <label for="warning" class="danger-level">Ponad stan ostrzegawczy</label>

            <input type="radio" name="danger-level" id="alarm" value='alarm'>
            <label for="alarm" class="danger-level">Ponad stan alarmowy</label>
            <button>Pokaż</button>
        </form>
    </section>

    <main>
        <section class="left">
            <h3>Stany na dzień 2022-05-05</h3>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>
                <!-- skrypt  -->
                 <!-- SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody -->

                <?php
                    if($danger_level_f){
                        foreach($levels as $level){
                            echo"<tr>
                                    <td>{$level['nazwa']}</td>
                                    <td>{$level['rzeka']}</td>
                                    <td>{$level['stanOstrzegawczy']}</td>
                                    <td>{$level['stanAlarmowy']}</td>
                                    <td>{$level['stanWody']}</td>
                                 </tr>";
                        }
                    };
                ?>
            </table>
            
        </section>

        <section class="right">
            <h3>informacje</h3>

            <ol>
                <li>Brak ostrzeżeń o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
            </ol>

            <h3>Średnie stany wód</h3>
            <!-- skrypt2 -->
             <!-- <p>Data:{['data']} Srednia[['srednia']]</p> -->
             <?php

             $sql ="SELECT dataPomiaru, AVG(stanWody) as srednia_wody
                    FROM pomiary
                    GROUP BY dataPomiaru;";
                $result = $link -> query($sql);
                $waters = $result -> fetch_all(1);

                foreach($waters as $water){
                    echo"
                     <p>Data:{$water['dataPomiaru']} Srednia:{$water['srednia_wody']}</p>
                    ";
                }

             ?>
            <a href="https://komunikaty.pl">Dowiedz się więcej</a>

            <img src="obraz2.jpg" alt="rzeka">
        </section>
    </main>

    <footer>
        <p>Stronę wykonał:00000</p>
    </footer>
</body>
</html>
<?php
$link->close();
?>