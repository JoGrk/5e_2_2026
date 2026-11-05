<?php
$counter=$_COOKIE['licznik'] ?? 0;
$counter++;
setcookie('licznik',$counter, time()+15);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><?php
    echo"<h3>$counter</h3>";
    ?>
</body>
</html>
