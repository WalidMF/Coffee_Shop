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
            <div class="main_section_style m-0 p-3">

              <?php


$con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', 'kalbozy^^');


$query1 = 'select   users.name ,  sum(distinct total)as totals
from users 
join user_order_product on user_order_product.user_id = users.id 
join orders_info on orders_info.order_id = user_order_product.order_id
group by users.name
';

$query1_prepared = $con->prepare($query1);
$result = $query1_prepared->execute();
echo '<pre>';
$query1_data=($query1_prepared->fetchAll(PDO::FETCH_ASSOC));
echo '</pre>';

$query4='select name from users ';
$query4_prepared = $con->prepare($query4);
 
$result = $query4_prepared->execute();
echo '<pre>';
$query4_data= ($query4_prepared->fetchAll(PDO::FETCH_ASSOC));
echo '</pre>';
?>



<form action="cheeks2.php" method="post" class="mt-3">
    
  <div class="row">
    <div class="col-5">
      <input type="date" class="form-control" placeholder="yy/mm/dd" name="from_date" >
    </div>
    <div class="col-5">
      <input type="date" class="form-control" placeholder="yy/mm/dd" name="till_date" >
    </div>

    
    <div class="col-2">
    <button class="btn btn-info" type="submit">search</button>
    </div>
</div>
<div class="row  mt-3">
  <div class="col-5 ">
<label for="chooseUserDrop" id="chooseUser">Choose a user:</label>
</div>
<div class="col-5">
<select name="user" id="chooseUserDrop" >
    <option >all users</option>
    <?php foreach($query4_data as $user) :?>
    <option > <?php foreach ($user as $key => $value): 
                        echo $value ;
                     endforeach ; ?> 
                     
                    </option>
                    <?php endforeach ; ?>

    
    
</select>
    </div>
    
    </div>
</form>

<!-- clients orders dashboard -->

<table class="table table-striped table-bordered table-hover table-primary mt-3" >
  <thead>
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">Orders Total</th>

    </tr>
  </thead>
  <tbody>
    <tr>

    <?php foreach ($query1_data as $user): ?>
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


        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>