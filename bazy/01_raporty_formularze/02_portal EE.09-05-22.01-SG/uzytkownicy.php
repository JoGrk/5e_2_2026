<?php
$link=new mysqli('localhost','root','','5e_2_portal');

$sql="SELECT COUNT(*) AS wiersze
        FROM dane;";
$result=$link->query($sql);
$count=$result->fetch_assoc();

$login_f = $_POST['login']??NULL;
$passwd_f = $_POST['passwd']??NULL;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section class="hdrLeft">
            <h2>Nasze osiedle</h2>
        </section>

        <section class="hdrRight">
            <!-- skrypt1 -->
             <h5>Liczba użytkowników portalu:<?= $count['wiersze']?></h5>
        </section>
    </header>

    <main>
        <section class="left">
            <h3>Logowanie</h3>
            <form action="uzytkownicy.php" method="post">
                <label for="login">Login</label><br>
                <input type="text" name="login" id="login"><br>
                <label for="passwd">Haslo</label><br>
                <input type="password" name="passwd" id="passwd"><br>
                <button>Zaloguj</button>
            </form>
        </section>
        <section class="right">
                <h3>wizytowka</h3>
                <div class='business-card'>
                    <!-- skrypt2 -->
                    <?php
                        if($login_f && $passwd_f){
                            $sql = "SELECT haslo
                                    FROM uzytkownicy
                                    WHERE login = '$login_f';";
                            $result = $link -> query($sql);

                            if($result -> num_rows == 0){
                                echo"Login nie istnieje";
                            }
                            else{
                                // login istnieje
                                $passwd = $result -> fetch_assoc();
                                $passwd_b = $passwd['haslo'];

                                if($passwd_b !== sha1($passwd_f)){
                                    echo"hasło nieprawidłowe";
                                }
                                else{
                                    // hasła sie zgadzają
                                    $sql="SELECT login, year(current_date) - rok_urodz as wiek,przyjaciol, hobby, zdjecie 
                                    FROM uzytkownicy
                                     INNER JOIN dane USING(id);";
                                    $result=$link->query($sql);
                                    $data=$result->fetch_assoc();
                                    // $age = date("%Y")-$data['rok_urodz'];
                                    // $age = (int)date("%Y") - (int)$data['rok_urodz'];
                                    // $age = date("%Y") ;
                                    echo"
                                    <img src='{$data['zdjecie']}' alt='osoba'>
                                    <h4>{$data['login']} ({$data['wiek']})</h4>
                                    <p>hobby: {$data['hobby']}</p>
                                    <h1><img src='icon-on.png' alt=''>
                                        {$data['przyjaciol']}
                                    </h1>
                                    <a href='dane.html'><button>Wiecej informacji</button></a>
                                    ";
                                    

                                }
                            }
                        }
                        
                        
                    ?>
                    <!-- <img src='zdjecie' alt='osoba'>
                    <h4>login (wiek)</h4>
                    <p>hobby: hobby</p>
                    <h1><img src='icon-on.png' alt=''>
                        przyajciol
                    </h1>
                    <a href='dane.html'><button>Wiecej informacji</button></a> -->
                </div>
        </section>
    </main>

    <footer>
        strone wykonal: 348959034
    </footer>
</body>
</html>
<?php
$link->close();
?>