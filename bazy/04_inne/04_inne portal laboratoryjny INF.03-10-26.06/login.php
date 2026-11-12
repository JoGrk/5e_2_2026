<?php
    session_start();
   
    
    $login_F = $_POST['login'] ?? NULL;
    $password_F = $_POST['password'] ?? NULL;


    if($login_F == 'admin' && $password_F == '1234'){
        $_SESSION['username']='admin';
        header('location:wyniki.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <!-- Efekt działania skryptu 1 -->
    <header>
        <h1>Portal laboratorium</h1>
    </header>

    <main class="login">
        <h2>Zaloguj się do systemu</h2>
        <form action="login.php" method="post">
            <label for="login">Login</label>
            <input type="text" name="login" id="login"> <br>
            <label for="password">Hasło:</label>
            <input type="password" name="password" id="password"> <br>
            <button>Zaloguj</button>
        </form>
    </main>

    <footer>
        <p>Wykonał:xyz</p>
    </footer>
    
</body>
</html>

<?php
    
?>