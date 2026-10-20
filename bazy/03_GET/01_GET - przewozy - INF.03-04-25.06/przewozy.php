<?php
    $link = new mysqli('localhost', 'root', '', '5e_2_przewozy');

    $taskid_G=$_GET['task_id']?? null;
    $task_f = $_POST['task']??null;
    $date_f = $_POST['date']??null;

    if($task_f && $date_f){
        $sql = "INSERT INTO zadania
                (zadanie, data, osoba_id)
                VALUES
                ('$task_f', '$date_f',1);";
        $result = $link -> query($sql);
        header('location:przewozy.php');
    }

    if($taskid_G){
        $sql="DELETE FROM zadania
            WHERE id_zadania = $taskid_G;";
        $result =$link->query($sql);
    }

    $sql = "SELECT id_zadania, zadanie, data
            FROM zadania;";
    $result = $link -> query($sql);
    $tasks = $result -> fetch_all(1);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma przewozowa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Firma przewozowa Półdarmo</h1>
    </header>
    <nav>
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </nav>
    <main>
        <section class="left">
            <h2>Zadania do wykonania</h2>
            <table>
                <tr>
                    <th>Zadanie do wykonania</th>
                    <th>Data realizacji</th>
                    <th>Akcja</th>
                </tr>
                    <!-- SELECT id_zadania, zadanie, data -->

                    <?php
                        foreach($tasks as $task){
                            echo"<tr>
                                    <td>{$task['zadanie']}</td>
                                    <td>{$task['data']}</td>
                                    <td><a href='przewozy.php?task_id={$task['id_zadania']}'>usuń</a></td>
                                </tr>";
                        }
                    ?>
                <!-- <tr>
                    <td>{['zadanie']}</td>
                    <td>{['data']}</td>
                    <td><a href='przewozy.php?task_id={['id_zadania']}'>usuń</a></td>
                </tr> -->
            </table>

            <form action="" method="post">
                <label for="task">Zadanie do wykonania</label>
                <input type="text" name="task" id="task"><br>
                <label for="date">Data realizacji:</label>
                <input type="date" name="date" id="date">
                <button>Dodaj</button>
            </form>
        </section>
        <section class="right">
            <img src="./auto.png" alt="auto firmowe">
            <h3>Nasza specjalność</h3>
            <ul>
                <li>Przeprowadzki</li>
                <li>Przewóz mebli</li>
                <li>Przesyłki gabarytowe</li>
                <li>Wynajem pojazdów</li>
                <li>Zakupy towarów</li>
            </ul>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 0000000</p>
    </footer>
</body>
</html>

<?php
    $link -> close();
?>