<?php
session_start();
$login_f=$_POST['login']??NULL;

if($login_f){
    $_SESSION['nickname']=$login_f;
    header('location:strona.php');
    exit;
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
    <form action="index.php" method="post">
    <label for="login">Zagoguj</label>
    <input type="text" name="login" id="login">
    <button>pymck</button>
    </form>
</body>
</html>