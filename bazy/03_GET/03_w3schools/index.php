<?php
$link = new mysqli('localhost','root','','w3schools');

$sql ="SELECT ProductID,ProductName,price
        FROM products;";

$result = $link -> query($sql);
$products = $result -> fetch_all(1);
$product_g=$_GET['id-product']??NULL;
$price_g=$_GET['price']??NULL;
$name_g=$_GET['name']??NULL;

if($product_g && $price_g && $name_g){
    $sql="SELECT orderDate,quantity
FROM orders
    INNER JOIN order_details USING(orderID)
WHERE productID = $product_g;";

$result = $link -> query($sql);

$orders = $result -> fetch_all(1);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styl.css">
</head>
<body>
    <aside>
        <ul>
        <!-- <li>
            <a href='index.php?id-product= {ProductID}&name={ProductName}&price={price}'>
            {ProductID}. {ProductName} {price}</a>
        </li> -->
<?php

foreach ($products as $product) {
    echo"<li><a href='index.php?id-product={$product['ProductID']}&name={$product['ProductName']}&price={$product['price']}'>
            {$product['ProductID']}. {$product['ProductName']} {$product['price']}</a></li>";
}

?>
        </ul>
    </aside>

    <main>


    <?php
    
    
    if($product_g && $price_g && $name_g){
        echo"
            <div class='block'>
                <h1>$name_g</h1>
                <h2>$price_g</h2>
            </div>";
        foreach($orders as $order){
            echo"<div class='block'>
        <h4>{$order['quantity']} {$order['orderDate']}</h4>
        
    </div>";}
        }
    ?>
    <!-- <div class='block'>
        <h4>{['quantity']} {['orderDate']}</h4>
        
    </div> -->
        ciasteczko
    </main>
</body>
</html>

<?php
$link -> close()
?>