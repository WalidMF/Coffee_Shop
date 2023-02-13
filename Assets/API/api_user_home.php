<?php

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
        <div class="col-2 ps-0 mt-3">
            <button class="card h-100" onclick="addProductToBill()">
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
        <div class="col-2 ps-0 mt-3">
            <button class="card h-100" onclick="addProductToBill()">
                <img src="Assets/Images/Products/<?php echo $product['picture'] ?>" class="card-img-top p-3" alt="<?php echo $product['name'] ?>">
                <div class="card-body p-1 text-start">
                    <h6 class="card-title"><?php echo $product['name'] ?></h6>
                    <p id="product_price" class="card-text">$<?php echo $product['price'] ?></p>
                </div>
            </button>
        </div>
    <?php }
}


?>