
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Fletchers assignment3</title>
</head>
<body>
<?php
include 'connectdb.php';
?>

<h1>Products not purchased:</h1>
<ol>
<?php
   $query = 'SELECT * FROM product WHERE product.prodID NOT IN (SELECT product.prodID FROM product INNER JOIN purchases ON product.prodID = purchases.prodID)';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["description"] .": " . $row["cost"];
     }
     mysqli_free_result($result);
?>
<br>
<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a>


<?php
   mysqli_close($connection);
?>
</body>
</html>
