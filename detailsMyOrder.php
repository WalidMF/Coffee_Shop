
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Coffee Shop - My Orders</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Page icon -->
        <link rel="shortcut icon" href="Assets/Images/icon.png" type="image/x-icon">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="Assets/Styles/style_main.css">


        <style>
            ::-webkit-scrollbar{
                width: 1px;
            }

            #scroll{
                max-height: 700px;
                overflow: auto;
            }
        </style>

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
                <h5 class="m-0 text-secondary d-none d-lg-block text-center">USER</h5>
            </div>
                <div class="btn-group-vertical w-100 pt-4 pt-lg-1 p-2">
                    <a href="User_Home.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-house mx-2"></i><span class="d-none d-lg-inline">Home</span></a>
                    <a href="User_Orders.php" class="btn btn-outline-light text-start p-2 my-1 active"><i class="fa-solid fa-bag-shopping mx-2"></i><span class="d-none d-lg-inline">My Orders</span></a>
                    <a href="Login.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-right-from-bracket mx-2"></i><span class="d-none d-lg-inline">Sign Out</span></a>
                </div>
            </div>
            <!-- Main Section -->
            <div class="main_section_style m-0 p-5" id="scroll">
                
                <h3>Order Details...</h3>
                <br>
        

        <table class="table table-striped">
        <thead>
        <tr class="table-light">
        <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Picture</th>
            <th scope="col">Amount</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
      <?php
      

       $detailsMyOrder=$_GET['viewdetails'];
       
       $conn = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
       $user_id = $_COOKIE["user_id"];
       
       $query3="SELECT DISTINCT product_id ,products.name , products.price ,products.picture , product_count, (products.price * product_count) AS Total
            FROM user_order_product
            INNER JOIN products ON products.id = user_order_product.product_id
            WHERE user_order_product.order_id AND user_order_product.user_id='$user_id' AND order_id=$detailsMyOrder";
           $sql=$conn->prepare($query3);
           $sql->execute();
           $myOrderDetails = $sql->fetchAll(PDO::FETCH_ASSOC);

           foreach($myOrderDetails as $row)
           {     
       ?>           
       <tr >
            <td><?=$row['name']; ?></td>
            <td>$<?=$row['price'] ;?></td>
            <td>
         <?php 
        ?>
        <img src="./Assets/Images/Products/<?php echo $row['picture']?>" class="card-img-top" style="width: 10%;height:10%;margin:15px"> 
            </td>
            <td><?=$row['product_count'] ;?></td>
            <td>$<?=$row['Total'] ;?></td>
        </tr>
         <?php
           }
           ?>
        </tbody>
        </table> 
            </div>
        </div>
       
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>