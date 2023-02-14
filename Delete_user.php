<?php
 $id =$_GET["deleteid"];
 $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
            $query = " DELETE FROM users WHERE id=$id;";
            $sql = $con->prepare($query);
            $sql->execute();
            header('Location:All_Users.php');
            die();      
?>