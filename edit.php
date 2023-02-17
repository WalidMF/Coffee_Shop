<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['product'];
    $price = $_POST['price'];
    $category_id = $_POST['category'];
    $status = $_POST['status'];

    
    $picture = $_FILES['product_picture']['name'];
    $target_dir = "Assets/images/products/";
    $target_file = $target_dir . basename($picture);
    move_uploaded_file($_FILES["product_picture"]["tmp_name"], $target_file);
    $query = "UPDATE products SET name = ?, price = ?, picture = ?,status = ?, category_id = ?  WHERE id = ?";


    $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
    $stmt = $con->prepare($query);

    $stmt->execute([$name, $price, $picture, $status, $category_id, $id]);
//  $stmt->execute();
    header('Location: All_products.php?id=' . $id);
    exit();
}
?>