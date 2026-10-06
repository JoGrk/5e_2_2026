<?php
$link = new mysqli('localhost', 'root', '', '5e_2_biblioteka');
  
//    skrypt 3 - obłsuga formularza

    $l_id_f = $_POST['l_id']??NULL;
    $e_id_f = $_POST['e_id']??NULL;
    $d_id_f = $_POST['d_id']??NULL;

    if($l_id_f){
        $sql = "SELECT tytul
                FROM ksiazka
                WHERE id = $l_id_f;";
        $result = $link -> query($sql);
        $l_book = $result -> fetch_assoc();

        $sql = "UPDATE ksiazka
                SET rezerwacja = 1
                WHERE id = $l_id_f;";
        $result = $link -> query($sql);
    }

    if($e_id_f){
        $sql = "SELECT tytul
                FROM ksiazka
                WHERE id = $e_id_f;";
        $result = $link -> query($sql);
        $e_book = $result -> fetch_assoc();

        $sql = "UPDATE ksiazka
                SET rezerwacja = 1
                WHERE id = $e_id_f;";
        $result = $link -> query($sql);
    }

    if($d_id_f){
        $sql = "SELECT tytul
                FROM ksiazka
                WHERE id = $d_id_f;";
        $result = $link -> query($sql);
        $d_book = $result -> fetch_assoc();

        $sql = "UPDATE ksiazka
                SET rezerwacja = 1
                WHERE id = $d_id_f;";
        $result = $link -> query($sql);
    }


    // skrypt 2 - do list rozwijanych
    $sql = "SELECT id, tytul 
            FROM ksiazka
            WHERE gatunek = 'liryka';
    
    ";
    $result =$link -> query($sql);
    $l_titles = $result -> fetch_all(1);

    $sql = "SELECT id, tytul 
            FROM ksiazka
            WHERE gatunek = 'epika';
    
    ";
    $result =$link -> query($sql);
    $e_titles = $result -> fetch_all(1);

    $sql = "SELECT id, tytul 
            FROM ksiazka
            WHERE gatunek = 'dramat';
    
    ";
    $result =$link -> query($sql);
    $d_titles = $result -> fetch_all(1);

    // skrypt4

    $sql="SELECT tytul, id_cz, data_odd
        FROM ksiazka
            INNER JOIN wypozyczenia ON wypozyczenia.id_ks = ksiazka.id
        ORDER BY data_odd
        LIMIT 15;";
    $result = $link -> query($sql);
    $orders = $result -> fetch_all(1);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header>
        <!-- skrypt1 -->
         <!-- <img src='obraz.png' alt=''> -->
         <?php
            for($i=0; $i<20; $i++){
                echo"<img src='obraz.png' alt=''>";
            }
         ?>
    </header>

    <main>
        <section class="first">
            <h2>Liryka</h2>

            <form action="" method="post">
                <select name="l_id" id="">
                    <!-- skrypt 2 -->
                     <!-- SELECT id, tytul -->
                      <!-- <option value='{id}'>{tytul}</option> -->
                      <?php
                        foreach($l_titles as $title){
                            echo"<option value='{$title['id']}'>{$title['tytul']}</option>";
                        }
                      ?>
                </select>

                <button>Rezerwuj</button>
                <!-- skrypt3 -->
                 <!-- <p>Książka {tytul} została zarezerwowana</p> -->
                  <?php
                  if($l_id_f){
                    echo"<p>Książka {$l_book['tytul']} została zarezerwowana</p>";
                  }
                  ?>
            </form>
        </section>

        <section class="second">
            <h2>Epika</h2>

            <form action="" method="post">
                <select name="e_id" id="">
                    <!-- skrypt2 -->
                     <?php
                        foreach($e_titles as $title){
                            echo"<option value='{$title['id']}'>{$title['tytul']}</option>";
                        }
                      ?>
                </select>

                <button>Rezerwuj</button>
                <!-- skrypt3 -->
                  <?php
                  if($e_id_f){
                    echo"<p>Książka {$e_book['tytul']} została zarezerwowana</p>";
                  }
                  ?>
            </form>
        </section>

        <section class="third">
            <h2>Dramat</h2>

            <form action="" method="post">
                <select name="d_id" id="">
                    <!-- skrypt2 -->
                    <?php
                        foreach($d_titles as $title){
                            echo"<option value='{$title['id']}'>{$title['tytul']}</option>";
                        }
                      ?>
                </select>

                <button>Rezerwuj</button>
                <!-- skrypt3 -->
                  <?php
                  if($d_id_f){
                    echo"<p>Książka {$d_book['tytul']} została zarezerwowana</p>";
                  }
                  ?>
            </form>
        </section>
 
        <section class="fourth">
        <h2>Zaległe książki</h2>
            <ul>
                <!-- skrypt 4 -->
                 <!-- SELECT tytul, id_cz, data_odd -->
                 <!-- <li>{tytul} {id_cz} {data_odd}</li> -->
                  <?php
                    foreach($orders as $order){
                        echo"
                        <li>{$order['tytul']} {$order['id_cz']} {$order['data_odd']}</li>";
                    }
                  ?>
                 
            </ul>
        </section>
    </main>

    <footer>
        <p>
            <strong>Autor:0000000</strong>
        </p>
    </footer>
    
</body>
</html>

<?php
$link -> close();
?>