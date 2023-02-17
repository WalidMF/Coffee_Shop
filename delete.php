<?php
$con=new PDO('mysql:host=localhost;dbname=coffee_shop','root','');
$id=$_GET['id'];
$query = "DELETE FROM products WHERE id=$id ";
$sql= $con -> prepare($query);
$res=$sql->execute();

header("Location: All_products.php");
exit(); 
?>
?>