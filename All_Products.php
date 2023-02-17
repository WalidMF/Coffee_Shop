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
  <link rel="stylesheet" href="./main.css">

 
 
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

      $query = "SELECT * FROM products";
      $sql = $conn->prepare($query);
      $sql->execute();
      $all_products = $sql->fetchAll(PDO::FETCH_ASSOC);

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
        <a href="All_Products.php" class="btn btn-outline-light text-start p-2 my-1 active"><i class="fa-solid fa-mug-saucer mx-1"></i><span class="d-none d-lg-inline">Products</span></a>
        <a href="All_Users.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-user mx-2"></i><span class="d-none d-lg-inline">Users</span></a>
        <a href="Admin_Orders.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-bag-shopping mx-2"></i><span class="d-none d-lg-inline">Orders</span></a>
        <a href="Cheeks.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-circle-check mx-2"></i><span class="d-none d-lg-inline">Cheeks</span></a>
        <a href="Login.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-right-from-bracket mx-2"></i><span class="d-none d-lg-inline">Sign Out</span></a>
      </div>
    </div>
    <!-- Main Section -->
    <div class="main_section_style m-0 p-3">

      <?php

        $result_per_page=6;
        $num_of_pro=sizeof($all_products);
        $num_of_pages=ceil($num_of_pro/$result_per_page);
        if (!isset($_GET['page']))
        {
            $page=1;
        }
        else
        {
            $page=$_GET['page'];
        }

        $page_first_result=($page-1)*$result_per_page;


      
      $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
      $query = "SELECT * FROM products LIMIT ".$page_first_result.','.$result_per_page.';';
      $sql = $con->prepare($query);
      $res = $sql->execute();
      $products = ($sql->fetchAll(PDO::FETCH_ASSOC));
     
      ?>

      <div class="container h-100 p-5">
        <div class="row py-3">
          <div class="col-6">
            <h3>All Products...</h3>
          </div>
          <div class="col-6 d-flex justify-content-end">
            <a href="Add_product.php"><button type="button" class="btn btn-primary px-3" name="save">Add Products</button></a>
          </div>
        </div>
        <div class="table-wrapper">

        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Price</th>
              <th>Picture</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
         

            <?php
            // Loop through each product and display their information
            foreach ($products as $product) {
              echo "<tr>";
              echo "<td>" . $product['id'] . "</td>";
              echo "<td>" . $product['name'] . "</td>";
              echo "<td>" . $product['price'] . " EGP " . "</td>";
              echo "<td>". "<img class='product-image' src='Assets/images/products/" . $product['picture'] . "' alt='" . $product['name'] . "'></td>";
              echo "<td>" . $product['status'] . "</td>";


              echo "<td>";
              echo "<a href='update.php?id=" . $product['id'] . "' class='btn btn-primary btn-sm' onclick='return confirm(\"Are you sure?\");'><i class='fas fa-edit'></i></a> " ." ";

              echo "<a href='delete.php?id=" . $product['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\");'><i class='fas fa-trash-alt'></i></a>";
              echo "</td>";
              echo "</tr>";
            }
                            
            ?>


          </tbody>
        </table>

      </div>

<?php
      for($page=1;$page<=$num_of_pages;$page++)
      {
          echo '<a class="btn btn-outline-primary" href="All_Products.php?page='.$page.'">'.$page.'</a> '; //pagination button
      }
?>



    </div>
  </div>

  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>