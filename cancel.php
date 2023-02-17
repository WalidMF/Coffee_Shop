<?php
$id=$_GET['cancelid'];

// echo $id;
$conn = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');

$status= "UPDATE orders_info SET status='Cancel' WHERE order_id=$id";
   $sql=$conn->prepare($status);     
   $sql->execute();
  header("Location:User_Orders.php");
  die();

?>