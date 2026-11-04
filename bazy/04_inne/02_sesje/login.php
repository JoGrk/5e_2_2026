<?php
    $password_f = $_POST['password']??NULL;
    if($password_f == 'admin'){
        setcookie('rola', 'admin', time()+60*60*24);
    }
    else{
        setcookie('rola','user',time()+60*60*24);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="panel.php">panelek</a>
    <form action="" method="post">
        <input type="password" name="password" id="password">
        <label for="password">Podaj hasło:</label>
        <button>Przycisk</button>
    </form>
</body>
</html>