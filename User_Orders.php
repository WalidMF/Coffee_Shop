
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
                
                <h1> My Orders </h1>
                <br>
        <div class="row ">
        <form action=" ./User_Orders.php " method="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <br>

                                      <button type="submit"  name="submit" class="btn btn-primary w-100">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
            </div>
            <br>
        <table class="table table-striped">
        <thead class="sticky-top">
        <tr class="table-light">
        <th scope="col">Order Date</th>
            <th scope="col">Status</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
            <th>View Details</th>
        </tr>
        </thead>
        <tbody>
            <?php

$user_id = $_COOKIE["user_id"];

$conn = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');


//////// get user order by filter date 
    
    

///////////// get user order from  database
if(isset($_POST['from_date']) && isset($_POST['to_date'])){
   $from_date=$_POST['from_date'];
   $to_date=$_POST['to_date'];

   $query ="SELECT DISTINCT orders.date, orders_info.status,orders_info.total ,user_order_product.order_id FROM
   ( (orders INNER JOIN orders_info ON orders.id = orders_info.order_id) INNER JOIN
   user_order_product ON orders.id = user_order_product.order_id) WHERE user_order_product.user_id='$user_id 'AND date BETWEEN '$from_date' AND '$to_date' ";

  
}else{
    
    $query ="SELECT DISTINCT orders.date, orders_info.status,orders_info.total ,user_order_product.order_id FROM
                ( (orders INNER JOIN orders_info ON orders.id = orders_info.order_id) INNER JOIN
                user_order_product ON orders.id = user_order_product.order_id) WHERE user_order_product.user_id=$user_id ";
 
}

   $sql = $conn->prepare($query);
    $sql->execute();
    $my_order = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($my_order as $row)
    {
        
        if($row['status']!="Cancel"){   

        ?>
        <tr>
            <td><?=$row['date']; ?></td>
            <td><?=$row['status'] ;?></td>
            <td>$<?=$row['total'] ;?></td>
            <td>
            <?php
            if($row['status']=="Processing"){
                $x=$row['order_id'];
                echo ' <a href="cancel.php?cancelid='.$x.' " class="btn btn-danger" >Cancel</a>';
            }
            ?>
            </td>
            <td>
                <?php
                $y=$row['order_id'];
            echo ' <a href="detailsMyOrder.php?viewdetails='. $y.' " class="btn btn-primary" > View Details</a>';
        ?>
           </td>
        </tr>
        <?php
         }
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