<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciasteczko</title>
</head>
<body>
    <?php
        if(!isset($_COOKIE['ciasteczko'])){
            setcookie('ciasteczko', 'czekoladowe', time()+10);
            echo"ciasteczko zjedzone";
        }
        else{
            echo $_COOKIE['ciasteczko'];
        }
    ?>
</body>
</html>