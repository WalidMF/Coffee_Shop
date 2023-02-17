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

        <div class="m-0 p-3 h-100 w-100 d-flex">
            <!-- Right Side Section -->
            <div class="right_side_style pe-3 pt-3 pt-lg-2">
                <div class="user_info_style p-lg-4">
                    <img src="Assets/Images/user.png" alt="User Picture" class="rounded-circle w-100" >
                    <h4 class="mt-2 m-0 text-light d-none d-lg-block text-center">User Name</h4>
                    <h5 class="m-0 text-secondary d-none d-lg-block text-center">Admin</h5>
                </div>
                <div class="btn-group-vertical w-100 pt-4 pt-lg-1 p-2">
                    <a href="Admin_Home.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-house mx-2"></i><span class="d-none d-lg-inline">Home</span></a>
                    <a href="Add_Product.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-mug-saucer mx-1"></i><span class="d-none d-lg-inline">Products</span></a>
                    <a href="All_Users.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-user mx-2"></i><span class="d-none d-lg-inline">Users</span></a>
                    <a href="Admin_Orders.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-bag-shopping mx-2"></i><span class="d-none d-lg-inline">Orders</span></a>
                    <a href="Cheeks.html" class="btn btn-outline-light text-start p-2 my-1 active"><i class="fa-solid fa-circle-check mx-2"></i><span class="d-none d-lg-inline">Cheeks</span></a>
                    <a href="Login.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-right-from-bracket mx-2"></i><span class="d-none d-lg-inline">Sign Out</span></a>
                </div>
            </div>
            <!-- Main Section -->
            <div class="main_section_style m-0 p-5">
<?php
$con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
$order_id=$_GET['search'];
//if(empty($order_id))
$query3 = ' select  distinct product_id ,products.name , products.price , product_count, (products.price * product_count) as Total
                 from user_order_product
                 inner join products on products.id = user_order_product.product_id
                 where user_order_product.order_id = :orderId
                  ';
                
                $query3_prepared = $con->prepare($query3);
                 $query3_prepared->bindParam(':orderId',$order_id);
                $result = $query3_prepared->execute();
                $query3_data = ($query3_prepared->fetchAll(PDO::FETCH_ASSOC));
                
                ?>
 <!--order details-->

 <h3 class="mt-3">Order <?php echo '#'. $order_id?> Product Details </h3>
 
 <table class="table table-striped table-bordered table-hover table-primary ml-1 mr-1 mt-4" >
                  <thead>
                    <tr>
                    <th scope="col"> product ID</th>
                    <th scope="col"> product name</th>
                      <th scope="col"> product price</th>
                      <th scope="col">product quantity</th>
                      <th scope="col">total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                
                    <?php foreach ($query3_data as $user): ?>
                                <tr>
                                <?php foreach ($user as $key => $value): ?>
                                        <td> <?php echo $value ?> </td>
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