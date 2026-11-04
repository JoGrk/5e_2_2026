<?php
    $name_f = $_POST['name']??NULL;
    if($name_f){
        setcookie('imie',$name_f,time()+60*60*24);
        setcookie('licznik',0,time()+60*60*24);
        $count = 0;
        header('location:zadanie3.php');
    }
    else if(isset($_COOKIE['licznik'])){
        $count = $_COOKIE['licznik'];
        $count += 1;
        setcookie('licznik', $count, time()+60*60*24);
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

    <form action="" method="post">
        <input type="text" name="name" id="name" placeholder="podaj imie">

        <button>przycisk</button>
    </form>

    <?php
    
        if(isset($_COOKIE['imie'])){
            echo"witaj uzytkowniku " . $_COOKIE['imie'];
            echo"po raz $count";
        }
    
    ?>
    
</body>
</html>