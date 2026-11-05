<?php
    session_start();
$role = $_SESSION['rola']??'';
if($role == 'admin'){
    $message = "Witaj admin, masz pełne prawa";
}
else if($role == 'user'){
    $message = "Witaj user, Twoje możliwości są ograniczone";

}
else{
    $message = "Nie znam cie";
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
    <a href="login.php">login</a>
    <?php
    echo"$message";
    ?>
    <a href="wyloguj.php">wyloguj</a>
</body>
</html>