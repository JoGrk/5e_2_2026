<?php
$link = new mysqli('localhost','root','','5e_2_remonty');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Malowanie i Gipsowanie</h1>
    </header>

    <main>
        <nav>
            <a href="kontakt.html">kontakt</a>
            <a href="https://remonty.pl" target="_blank">Partnerzy</a>
        </nav>
        <aside> </aside>
        <section class="left"></section>
        <section class="right"></section>
    </main>
    <footer></footer>
    
</body>
</html>
<?php
$link->close();
?>