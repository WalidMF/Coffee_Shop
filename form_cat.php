
<?php
if(isset($_POST['save'])) {
    $name = $_POST['category'];
    
    $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Use a prepared statement with named parameters to avoid SQL injection
    $stmt = $con->prepare("INSERT INTO category (name) VALUES (:name)");
    $stmt->bindParam(':name', $name);
  
    $result = $stmt->execute();
   
    if ($result) {
        echo "Category added successfully.";
        echo "Category added successfully.";
        header("Location: Add_product.php");
        exit();
    } else {
       echo "Error adding category.";
    }
   
}

?>