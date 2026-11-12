<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('location:login.php');
        exit;
    }


    $link = new mysqli('localhost', 'root', '', '5e_2_laboratorium'); 
    
    $sql = "SELECT imie, nazwisko, pesel, zlecenie.data as data_zlecenia, wynik.data as data_wyniku,plik
    FROM pacjent
        INNER JOIN zlecenie ON zlecenie.idPacjenta = pacjent.id
        LEFT JOIN wynik ON wynik.idZlecenia = zlecenie.id;";
    $result = $link -> query($sql);
    $datas = $result -> fetch_all(1);
    
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przeglądaj wyniki</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    Efekt działania skryptu 2
    <header>
        <h1>Portal laboratorium</h1>
        <p>
             Witaj, <strong><?=$_SESSION['username']?></strong>
        </p>
        <p><a href="wyloguj.php">Wyloguj</a></p>
    </header>

    <main>
        <h2>Wyniki pacjentów</h2>
        <div>
            <table>
            <tr>
                <th>Imię Pacjenta</th>
                <th>Nazwisko Pacjenta</th>
                <th>PESEL</th>
                <th>Data zlecenia</th>
                <th>Data wykonania</th>
                <th>Wynik</th>
            </tr>
            <!-- Zawartość tabeli generowana jest skryptem 3 -->
             <!-- SELECT imie, nazwisko, pesel, zlecenie.data as data_zlecenia, wynik.data as data_wyniku,plik -->
             <tr>
                <td>imie</td>
                <td>nazwisko</td>
                <td>pesel</td>
                <td>data_zlecenia</td>
                <td>data_wyniku</td>
                <td>plik</td>
             </tr>
        </table>
        </div>
    </main>

    <footer>
        <p>Wykonał:xyz</p>
    </footer>
    
</body>
</html>

<?php
    $link -> close();
?>