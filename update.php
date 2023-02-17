<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coffee Shop - Product</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Page icon -->
    <link rel="shortcut icon" href="Assets/Images/icon.png" type="image/x-icon">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="Assets/Styles/style_main.css">

</head>

<body>

    <div class="m-0 p-3 h-100 w-100 d-flex">

        <!-- Right Side Section -->
        <div class="right_side_style pe-3 pt-3 pt-lg-2">
            <div class="user_info_style p-lg-4">
                <img src="Assets/Images/user.png" alt="User Picture" class="rounded-circle w-100">
                <h4 class="mt-2 m-0 text-light d-none d-lg-block text-center">User Name</h4>
                <h5 class="m-0 text-secondary d-none d-lg-block text-center">Admin</h5>
            </div>
            <div class="btn-group-vertical w-100 pt-4 pt-lg-1 p-2">
                <a href="Admin_Home.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-house mx-2"></i><span class="d-none d-lg-inline">Home</span></a>
                <a href="Add_Product.html" class="btn btn-outline-light text-start p-2 my-1 active"><i class="fa-solid fa-mug-saucer mx-1"></i><span class="d-none d-lg-inline">Products</span></a>
                <a href="All_Users.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-user mx-2"></i><span class="d-none d-lg-inline">Users</span></a>
                <a href="Admin_Orders.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-bag-shopping mx-2"></i><span class="d-none d-lg-inline">Orders</span></a>
                <a href="Cheeks.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-circle-check mx-2"></i><span class="d-none d-lg-inline">Cheeks</span></a>
                <a href="Login.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-right-from-bracket mx-2"></i><span class="d-none d-lg-inline">Sign Out</span></a>
            </div>
        </div>
      
        <div class="main_section_style m-0 p-3">
    <div class="container mt-2">
        <?php 
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $query="SELECT * FROM products WHERE id=?";
            $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
            $stmt = $con->prepare($query);
            $stmt->execute([$id]); // use $id here
            $product= $stmt->fetch(PDO::FETCH_ASSOC);
           
            }
        
        ?>
        <h1 class="d-flex justify-content-center">Update Product</h1>
       
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
            <div class="mb-4 mt-4">
                <label for="name" class="fs-5">Product</label>
                <input type="text" class="form-control" id="name" placeholder="Enter product.." name="product" required value="<?php echo $product['name'] ?>">
            </div>
            <div class="mb-4 mt-4">
                <label for="num" class="fs-5">Price</label>
                <input type="number" class="form-control" id="num" placeholder="Enter price" name="price" required value="<?php echo $product['price'] ?>">
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="cat" class="fs-5">Category</label>
                    <select id="cat" class="form-select" aria-label="Default select example" name="category">
                        <?php
                        $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
                        $stmt = $con->prepare("SELECT * FROM category");
                        $stmt->execute();
                        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($categories as $category) {
                            $selected = $category['id'] == $product['category_id'] ? 'selected' : '';
                            echo '<option value="'.$category['id'].'" '.$selected.'>'.$category['name'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-4 mt-4">
                <label for="status" class="fs-5">Status</label>
                <select id="status" class="form-select" aria-label="Default select example" name="status">
                    
                    <!-- $selected = $product['status'] == 1 ? 'selected' : '';
                    echo '<option value="available" '.$selected.'>Available</option>';
                    $selected = $product['status'] == 0 ? 'selected' : '';
                    echo '<option value="unavailable" '.$selected.'>Unavailable</option>'; -->
                    <option value="available" style="background-color: #8BC34A; color: #fff; padding: 5px 10px; border-radius: 5px;" <?php echo $product['status'] == 1 ? 'selected' : ''; ?>>Available</option>
                   <option value="unavailable" style="background-color: #F44336; color: #fff; padding: 5px 10px; border-radius: 5px;" <?php echo $product['status'] == 0 ? 'selected' : ''; ?>>Unavailable</option>

                    
                </select>
            </div>
            <div class="mb-4 mt-4">
                <label for="product_picture" class="fs-5">Product picture</label>
                <input type="file" class="form-control" id="product_picture" name="product_picture"  value="<?php echo $product['picture'] ?>"required>
            </div>

            <br>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</div>


</div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min
