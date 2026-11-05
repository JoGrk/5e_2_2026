<?php
    session_start();
    
    if(isset($_SESSION['licznik'])){
        $_SESSION['licznik']+=1;
    }
    else{
        $_SESSION['licznik']=1;
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
    <a href="strona2.php">Strona2</a>
    <?php
        echo"To jest strona 1. ";
        echo"<p>Liczba odwiedzin w aplikacji: {$_SESSION['licznik']}</p>";
    ?>
</body>
</html>