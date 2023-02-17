<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Coffee Shop - Cheeks</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Page icon -->
        <link rel="shortcut icon" href="Assets/Images/icon.png" type="image/x-icon">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="Assets/Styles/style_main.css">
        <link rel="stylesheet" href="Assets/Styles/cheeks.css">
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
                    <a href="All_Products.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-mug-saucer mx-1"></i><span class="d-none d-lg-inline">Products</span></a>
                    <a href="All_Users.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-user mx-2"></i><span class="d-none d-lg-inline">Users</span></a>
                    <a href="Admin_Orders.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-bag-shopping mx-2"></i><span class="d-none d-lg-inline">Orders</span></a>
                    <a href="Cheeks.php" class="btn btn-outline-light text-start p-2 my-1 active"><i class="fa-solid fa-circle-check mx-2"></i><span class="d-none d-lg-inline">Cheeks</span></a>
                    <a href="Login.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-right-from-bracket mx-2"></i><span class="d-none d-lg-inline">Sign Out</span></a>
                </div>
            </div>
            <!-- Main Section -->
            <div class="main_section_style m-0 p-5">

              <?php

                $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');

               

                $dateFrom = $_POST['from_date'];
                $dateTill = $_POST['till_date'];
                $userName = $_POST['user'];
                
                if (empty($dateFrom)){$dateFrom='2023-01-01';};
                if (empty($dateTill)){$dateTill='2023-12-31';};
                if(empty($userName )){$userName='all users';};
                

                if($userName == "all users"){
          
                  $query2 = "select distinct orders.id ,date as 'order date', total 'order total' from orders
                  inner join user_order_product on user_order_product.order_id= orders.id
                  join orders_info on orders_info.order_id = user_order_product.order_id
                  inner join users on users.id = user_order_product.user_id
                  where `date` between :from_date and :till_date ";
                  
                  
                  $query2_prepared = $con->prepare($query2);
                  $query2_prepared->bindParam(':from_date', $dateFrom);
                  $query2_prepared->bindParam(':till_date', $dateTill);
                  $query2_prepared->execute();
                  $query2_data = ($query2_prepared->fetchAll(PDO::FETCH_ASSOC));
                  
                  $order_id = 5;
                  
                  $query3 = ' select distinct product_id ,products.name , products.price , product_count, (products.price * product_count) as Total
                   from user_order_product
                   inner join products on products.id = user_order_product.product_id
                   where user_order_product.order_id = (5)';
                  
                   $query3_prepared = $con->prepare($query3);
                   // $query3_prepared->bindParam(':order_id',$order_id);
                    $query3_prepared->execute();
                   $query3_data = ($query3_prepared->fetchAll(PDO::FETCH_ASSOC));
                
                } else 
                {
                $query2 = "select distinct orders.id ,date as 'order date', total 'order total' from orders
                inner join user_order_product on user_order_product.order_id= orders.id
                join orders_info on orders_info.order_id = user_order_product.order_id
                inner join users on users.id = user_order_product.user_id
                where `date` between :from_date and :till_date and users.name = :username";
                
                $query2_prepared = $con->prepare($query2);
                $query2_prepared->bindParam(':from_date', $dateFrom);
                $query2_prepared->bindParam(':till_date', $dateTill);
                $query2_prepared->bindParam(':username', $userName);
                $result = $query2_prepared->execute();
                $query2_data = ($query2_prepared->fetchAll(PDO::FETCH_ASSOC));
                
                
                $order_id = 5;
                
                $query3 = '
                 select distinct product_id ,products.name , products.price , product_count, (products.price * product_count) as Total
                 from user_order_product
                 inner join products on products.id = user_order_product.product_id
                 where user_order_product.order_id = (7)
                  ';
                
                $query3_prepared = $con->prepare($query3);
                // $query3_prepared->bindParam(':order_id',$order_id);
                $result = $query3_prepared->execute();
                $query3_data = ($query3_prepared->fetchAll(PDO::FETCH_ASSOC));
                
                } 
                ?>
               
                
                
                <form  role="search" action="viewOrderDetails.php" method="get" class="mt-3">
                  <div class="row">
                  <div class="col-10">
                  <input type="text" class="form-control" placeholder="Order Id Number" name="search" id="search">
                  </div>
                  <div class="col-2">
                  <button type="submit" class="btn btn-info w-100" id="searchButton"> search </button>
                  </div>
               </form>
                <!--specific date orders -->
                <table class="table table-striped table-bordered table-hover table-primary mt-4">
                  <thead>
                    <tr>
                    <th scope="col">Order ID</th>
                      <th scope="col">Order Date</th>
                      <th scope="col">Order Total</th>
                
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                
                    <?php foreach ($query2_data as $user): ?>
                      
                                <tr  >



                                
                                <?php foreach ($user as $key => $value): ?>
                                        <td> <?php echo $value; ?> </td>

                                    <?php endforeach;?>
                                </tr>
                            <?php endforeach;?>
                    </tr>
                
                  </tbody>
                </table>

               
                
                
              
                
                
                
                
                
                
                
                
                
                
                



            </div>
        </div>


        <script src="cheeks.js"></script>
 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>