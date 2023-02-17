<?php 

if(isset($_POST['submit'])) {
    $name = $_POST['product'];
    $price = $_POST['price'];
    $category_id = $_POST['category'];
    $status = 'Available';
    $picture = $_FILES['product_picture']['name'];
    $target_dir = "Assets/images/products/";
    $target_file = $target_dir . basename($picture);
    move_uploaded_file($_FILES["product_picture"]["tmp_name"], $target_file);

    $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Use a prepared statement with named parameters to avoid SQL injection
    $stmt = $con->prepare("INSERT INTO products (name, price, picture, status, category_id) VALUES (:name, :price, :picture, :status, :category_id)");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':picture', $picture);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':category_id', $category_id);
    $result = $stmt->execute();

    if ($result) {
        echo "Product added successfully.";
    } else {
        echo "Error adding product.";
    }
}
header("Location: All_products.php");
exit(); 
?>




















