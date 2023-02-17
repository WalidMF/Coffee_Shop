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

    <?php 
        
        // get user info from database
        $user_id = $_COOKIE["user_id"];
        $conn = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
        $query = "SELECT * FROM users";
        $sql = $conn->prepare($query);
        $sql->execute();
        $all_users = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($all_users as $user){
            if($user['id'] == $user_id){
                $user_name = $user['name'];
                $user_pic = $user['picture'];
            }
        }

    ?>

    <div class="m-0 p-3 h-100 w-100 d-flex">

        <!-- Right Side Section -->
        <div class="right_side_style pe-3 pt-3 pt-lg-2">
            <div class="user_info_style p-lg-2"> 
                <div class="p-3 pt-4 img-style">
                    <img src="Assets/Images/Users/<?php echo $user_pic; ?>" alt="User Picture" class="rounded-circle w-100" style="border: 3px solid white;">
                </div>                    
                <h4 class="mt-2 m-0 text-light d-none d-lg-block text-center"><?php echo $user_name; ?></h4>
                <h5 class="m-0 text-secondary d-none d-lg-block text-center">ADMIN</h5>
            </div>
            <div class="btn-group-vertical w-100 pt-4 pt-lg-1 p-2">
                <a href="Admin_Home.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-house mx-2"></i><span class="d-none d-lg-inline">Home</span></a>
                <a href="Add_Product.php" class="btn btn-outline-light text-start p-2 my-1 active"><i class="fa-solid fa-mug-saucer mx-1"></i><span class="d-none d-lg-inline">Products</span></a>
                <a href="All_Users.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-user mx-2"></i><span class="d-none d-lg-inline">Users</span></a>
                <a href="Admin_Orders.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-bag-shopping mx-2"></i><span class="d-none d-lg-inline">Orders</span></a>
                <a href="Cheeks.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-circle-check mx-2"></i><span class="d-none d-lg-inline">Cheeks</span></a>
                <a href="Login.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-right-from-bracket mx-2"></i><span class="d-none d-lg-inline">Sign Out</span></a>
            </div>
        </div>
        <!-- Main Section -->
        <div class="main_section_style m-0 p-3">
            <div class="container mt-2 p-5">
                <h3>Add Products...</h3>
                <form action="form.php" method="post" enctype="multipart/form-data">
                    <div class="mb-4 mt-4">
                        <label for="name" class="fs-6">product</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter product.." name="product" required>
                    </div>
                    <div class="mb-4 mt-4">
                        <label for="num" class="fs-6">Price</label>
                        <input type="number" class="form-control" id="num" placeholder=" please,Enter price" name="price" required>
                    </div>

                    <div class="row">
                        <div class="col-10">
                          
                    <label for="cat" class="fs-6">Category</label>
                    <select id="cat" class="form-select" aria-label="Default select example" name="category">
                        <?php
                           $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
                            $stmt = $con->prepare("SELECT * FROM category");
                            $stmt->execute();
                            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($categories as $category) {
                                echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                        
                        <div class="col-2 mt-4 d-flex justify-content-end ps-0">
                            <a href="Add_Category.php" class="w-100"><button type="button" class="btn btn-outline-primary w-100">Add Category</button></a>
                        </div>
                    </div>
                    <div class="mb-4 mt-4">
                        <label for="pro" class="fs-6">Product picture</label>
                        <input type="file" class="form-control" id="pro" name="product_picture" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary px-4 me-3" name="submit">Save</button>

                    <button type="reset" class="btn btn-secondary px-4" name="reset">Reset</button>

                </form>

            </div>











        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>