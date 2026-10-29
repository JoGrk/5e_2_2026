SELECT ProductID,ProductName,price
FROM products;

SELECT orderDate,quantity
FROM orders
    INNER JOIN order_details USING(orderID)
WHERE productID = 1;
    
