<?php
$con = new PDO('mysql:host=localhost;dbname=coffe_shop', 'khaled', '');
$alldata = [];

function all(&$alldata)
{
    global $con;
    $query = "
    SELECT n.name as Name,o.date as Order_Date, e.notes as Order_Notes,e.status as Order_Status, e.room as Room,e.total as Total_Price
    FROM orders_info e 
    INNER JOIN users n 
    ON n.id=e.id 
    INNER JOIN orders o
    ON e.id = o.id;  
    ";
    $sql = $con->prepare($query);
    $sql->execute();
    $alldata[] = $sql->fetchAll(PDO::FETCH_ASSOC);

}

function showData($data){ 
    ?> 
    <tbody> 
        <?php foreach ($data as $resource) : ?>
        <tr>
            <?php foreach ($resource as $key => $value) : ?>
            <td> <?php echo $value ?> </td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
<?php }; 



if(isset($_POST['submit'])){
    $selected = $_POST['status'];
    $query = "UPDATE orders_info SET status='$selected' where id=1";
    $sql = $con->prepare($query);
    $sql->execute();
}
all($alldata);

function images()
{
    global $con;
    $query = "
    SELECT picture FROM `products` WHERE category_id=1;
    ";
    $sql = $con->prepare($query);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Coffee Shop - Orders</title>

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
            <img src="Assets/Images/user.png" alt="User Picture" class="rounded-circle w-100" >
            <h4 class="mt-2 m-0 text-light d-none d-lg-block text-center">User Name</h4>
            <h5 class="m-0 text-secondary d-none d-lg-block text-center">Admin</h5>
        </div>
        <div class="btn-group-vertical w-100 pt-4 pt-lg-1 p-2">
            <a href="Admin_Home.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-house mx-2"></i><span class="d-none d-lg-inline">Home</span></a>
            <a href="Add_Product.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-mug-saucer mx-1"></i><span class="d-none d-lg-inline">Products</span></a>
            <a href="All_Users.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-user mx-2"></i><span class="d-none d-lg-inline">Users</span></a>
            <a href="Admin_Orders.html" class="btn btn-outline-light text-start p-2 my-1 active"><i class="fa-solid fa-bag-shopping mx-2"></i><span class="d-none d-lg-inline">Orders</span></a>
            <a href="Cheeks.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-circle-check mx-2"></i><span class="d-none d-lg-inline">Cheeks</span></a>
            <a href="Login.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-right-from-bracket mx-2"></i><span class="d-none d-lg-inline">Sign Out</span></a>
        </div>
    </div>
    <!-- Main Section -->
<div class="main_section_style m-0 p-3">
                
    <h2>Orders</h2>
    <?php foreach ($alldata as $data) : ?>
        <table id="example" class="table table-info table-striped dt-responsive nowrap" style="width:100%">
        <thead>
        <tr>
            <?php foreach ($data[0] as $header_key => $header_value) : ?> 
            <th>
                <?php echo $header_key; ?>
            </th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <?php showData($data)?>
</table>
<input class="btn btn-secondary " type="submit" data="hide" value="-" id="click">
<div class="img-box" id="para">
    <?php 
        $images = images();
        foreach ($images as $img):?>
        <img src="./Assets/Images/Products/<?php echo $img['picture']?>" class="card-img-top" style="width: 5%;height:5%;margin:15px"> 
        <?php endforeach?>
    </div>
    <?php endforeach; ?>













<div class="container">
<form action="http://localhost/Coffee_Shop-main/orders.php#" method="post">

        <label  class="form-label">Change Order Status</label>
        <select class="selectpicker form-select " aria-label="Default select example" name="status">
            <option value="progress">Progress..</option>
            <option value="processing">Processing</option>
            <option value="Out_Of_Delivery">Out Of Delivery</option>
            <option value="done">Done!</option>
            <option value="cancel">Cancelled</option>
        </select>
    <input class="btn btn-info mt-3 mb-3"type="submit" name="submit" vlaue="submit">
</form>

</div>
</div>
</div>
        
<?php

?>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
<script>
let click = document.getElementById("click")
let para = document.getElementById("para")
click.addEventListener("click",e =>{
    e.preventDefault()
    if (click.getAttribute("data") === "hide") {
        click.setAttribute("data","show")
        click.setAttribute("value", "+")
        para.style.display = "none"
    } else {
    click.setAttribute("data", "hide")
    click.setAttribute("value", "-")
    para.style.display = "block"
    }
})
</script>