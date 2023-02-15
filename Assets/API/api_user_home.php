<?php

// connection string
$conn = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');

// select categoty api
if(isset($_POST['cate_id'])){

    $cat_id = $_POST['cate_id'];
    if($cat_id == '0'){
        $query = "SELECT * FROM products";
    }
    else{
        $query = "SELECT * FROM products WHERE category_id LIKE $cat_id";
    }
    $sql = $conn->prepare($query);
    $sql->execute();
    $all_products = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($all_products as $product){ ?>
        <div class="col-2 ps-0 my-1">
            <button class="card h-100" onclick="addProductToBill(this)" value="<?php echo $product['id'] ?>">
                <img src="Assets/Images/Products/<?php echo $product['picture'] ?>" class="card-img-top p-3" alt="<?php echo $product['name'] ?>">
                <div class="card-body p-1 text-start">
                    <h6 class="card-title"><?php echo $product['name'] ?></h6>
                    <p id="product_price" class="card-text">$<?php echo $product['price'] ?></p>
                </div>
            </button>
        </div>
    <?php }
}

// search api
if(isset($_POST['input'])){

    $input = $_POST['input'];
    $query = "SELECT * FROM products WHERE name LIKE '%{$input}%'";
    $sql = $conn->prepare($query);
    $sql->execute();
    $all_products = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($all_products as $product){ ?>
        <div class="col-2 ps-0 my-1">
            <button class="card h-100" onclick="addProductToBill(this)" value="<?php echo $product['id'] ?>">
                <img src="Assets/Images/Products/<?php echo $product['picture'] ?>" class="card-img-top p-3" alt="<?php echo $product['name'] ?>">
                <div class="card-body p-1 text-start">
                    <h6 class="card-title"><?php echo $product['name'] ?></h6>
                    <p id="product_price" class="card-text">$<?php echo $product['price'] ?></p>
                </div>
            </button>
        </div>
    <?php }
}

// display bill api
if(isset($_POST['bill'])){

    // users
    $query = "SELECT * FROM users";
    $sql = $conn->prepare($query);
    $sql->execute();
    $users = $sql->fetchAll(PDO::FETCH_ASSOC);
    // products
    $query = "SELECT * FROM products";
    $sql = $conn->prepare($query);
    $sql->execute();
    $products = $sql->fetchAll(PDO::FETCH_ASSOC);

    // total
    $pric = 0;
    $total = 0;
    
    //display bill
    $bil = $_POST['bill'];
    $query = "SELECT * FROM user_order_product WHERE order_id LIKE $bil";
    $sql = $conn->prepare($query);
    $sql->execute();
    $all_rows = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($all_rows as $row){ ?>
        <tr>
            <td class="col-6"><?php echo $products[$row['product_id']-1]['name']; ?></td>
            <td class="col-3 px-0">
                <div class="input-group">
                    <button class="plus-num p-0 px-2" type="button" onclick="plusNum(this)" value="<?php echo $row['product_id']; ?>">+</button>
                    <input type="text" value="<?php echo $row['product_count'] ?>" readonly class="product-num form-control shadow-sm text-center p-0">
                    <button class="minus-num p-0 px-2" type="button" onclick="minusNum(this)" value="<?php echo $row['product_id']; ?>">-</button>                                        
                </div>
            </td>
            <?php 
                $pric = $products[$row['product_id']-1]['price']*$row['product_count'];
                $total += $pric;
            ?>
            <td class="col-3 text-center">$<?php echo $pric ?>.00</td>
        </tr>
    <?php
    }
    ?>
        <script>$("#total_id").text("<?php echo $total ?>")</script>
    <?php
}

// add and minus count product api
if(isset($_POST['quantity'])){
    $quant = $_POST['quantity'];
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $order_id = $_POST['order_id'];
    if($quant==0){
        $query = "DELETE FROM `user_order_product` WHERE `user_id`=$user_id and `product_id`=$product_id and `order_id`=$order_id;";
    }
    else{
        $query = "UPDATE `user_order_product` SET `product_count`=$quant WHERE `user_id`=$user_id and `product_id`=$product_id and `order_id`=$order_id;";
    }
    $sql = $conn->prepare($query);
    $sql->execute();
}

// add new bill in database
if(isset($_POST['new_bill'])){
    
    $newBill = $_POST['new_bill'];
    $date = date("Y/m/d");
    $query = "INSERT INTO `orders` (`id`, `date`) VALUES (NULL, '$date');";
    $sql = $conn->prepare($query);
    $sql->execute();
    $query = "SELECT max(id) from orders;";
    $sql = $conn->prepare($query);
    $sql->execute();
    $bill = $sql->fetchAll(PDO::FETCH_ASSOC);
    $bill_no = $bill[0]['max(id)'];
    echo $bill_no;
}

// save bill in database
if(isset($_POST['save_bill'])){
    $notes = $_POST['notes'];
    $room = $_POST['room'];
    $total = $_POST['total'];
    $order_id = $_POST['order_id']; 
    $query = "INSERT INTO `orders_info` (`id`, `status`, `notes`, `room`, `total`, `order_id`) VALUES (NULL, 'Processing', '$notes', '$room', '$total', '$order_id');";
    $sql = $conn->prepare($query);
    $sql->execute();
}




?>