<?php
    if(!isset($_COOKIE['licznik'])){
        setcookie('licznik', '1', time()+15);
        $count = 1;
    }
    else{
        $count = $_COOKIE['licznik'];
        $count += 1;
        setcookie('licznik', $count, time()+15);
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
    <?php

    
    echo $count


    ?>
</body>
</html>