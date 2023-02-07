<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Coffee Shop - Home</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Page icon -->
        <link rel="shortcut icon" href="Assets/Images/icon.png" type="image/x-icon">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="Assets/Styles/style_main.css">
        <link rel="stylesheet" href="Assets/Styles/user_home_style.css">

    </head>

    <body>

        <?php 
        
        // get user info from database
        $user_id = 0;
        $conn = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
        $query = "SELECT * FROM users";
        $sql = $conn->prepare($query);
        $sql->execute();
        $all_users = $sql->fetchAll(PDO::FETCH_ASSOC);
        $user_name = $all_users[$user_id]['name'];
        $user_pic = $all_users[$user_id]['picture'];
        // get categorys from database
        $query = "SELECT * FROM category";
        $sql = $conn->prepare($query);
        $sql->execute();
        $all_cate = $sql->fetchAll(PDO::FETCH_ASSOC);
        // bill number
        $bill_no = date("ymdhms");
        // get products from database
        $query = "SELECT * FROM products";
        $sql = $conn->prepare($query);
        $sql->execute();
        $all_products = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        ?>
        
        <div class="m-0 p-3 h-100 w-100 d-flex">
            <!-- Right Side Section -->
            <div class="right_side_style pe-3 pt-3 pt-lg-2">
                <div class="user_info_style p-lg-4"> 
                    <img src="Assets/Images/Users/<?php echo $user_pic; ?>" alt="User Picture" class="rounded-circle w-100" >
                    <h4 class="mt-2 m-0 text-light d-none d-lg-block text-center"><?php echo $user_name; ?></h4>
                    <h5 class="m-0 text-secondary d-none d-lg-block text-center">user</h5>
                </div>
                <div class="btn-group-vertical w-100 pt-4 pt-lg-1 p-2">
                    <a href="User_Home.html" class="btn btn-outline-light text-start p-2 my-1 active"><i class="fa-solid fa-house mx-2"></i><span class="d-none d-lg-inline">Home</span></a>
                    <a href="User_Orders.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-bag-shopping mx-2"></i><span class="d-none d-lg-inline">My Orders</span></a>
                    <a href="Login.html" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-right-from-bracket mx-2"></i><span class="d-none d-lg-inline">Sign Out</span></a>
                </div>
            </div>
            <!-- Main Section -->
            <div class="main_section_style m-0 p-4">
                <div class="row h-100">
                    <div class="col-8">
                        <div class="row w-100 m-0">
                            <div class="col-4 ps-0">
                                <select class="form-select fs-6 shadow p-2 ps-3 mb-4 bg-body" aria-label="Default select example">
                                    <option selected>Select Category</option>
                                    <?php foreach($all_cate as $cate){ ?>
                                        <option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-8 ps-0">
                                <div class="input-group w-100">
                                    <input type="search" id="search_input" class="form-control fs-6 shadow p-2 ps-3 mb-4 bg-body" placeholder="Search" />
                                    <button type="button" class="btn btn-primary fs-6 shadow p-2 mb-4"><i class="fas fa-search px-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0" id="products_menu">
                            <div class="row w-100 m-0 mb-3">
                                <?php foreach($all_products as $product){ ?>
                                <div class="col-2 ps-0 mt-3">
                                    <button class="card h-100" onclick="addProductToBill()">
                                        <img src="Assets/Images/Products/<?php echo $product['picture'] ?>" class="card-img-top p-3" alt="<?php echo $product['name'] ?>">
                                        <div class="card-body p-1 text-start">
                                            <h6 class="card-title"><?php echo $product['name'] ?></h6>
                                            <p id="product_price" class="card-text">$<?php echo $product['price'] ?></p>
                                        </div>
                                    </button>
                                </div>
                                <?php } ?>
                            </div>      
                        </div>
                    </div>
                    <div class="col-4 ps-0">
                        <div class="w-100 h-100 shadow p-4 mb-5 bg-body rounded " >
                            <div class="row">
                                <div class="col-6 p-1">
                                    <div class="input-group">
                                        <span class="input-group-text shadow-sm" id="inputGroup-sizing-default">Date</span>
                                        <input type="text" readonly class="form-control shadow-sm" value="<?php echo date("d/m/Y"); ?>">
                                    </div>
                                </div>
                                <div class="col-6 p-1">
                                    <div class="input-group">
                                        <span class="input-group-text shadow-sm" id="inputGroup-sizing-default">Bill</span>
                                        <input type="text" readonly class="form-control shadow-sm" value="<?php echo $bill_no; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-1">
                                    <div class="input-group">
                                        <span class="input-group-text shadow-sm" id="inputGroup-sizing-default">User</span>
                                        <input type="text" readonly class="form-control shadow-sm" value="<?php echo $user_name; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row h-50">
                                <table class="table mt-3">
                                    <thead>
                                    <tr>
                                        <th class="col-6">Name</th>
                                        <th class="col-3 text-center">Quant</th>
                                        <th class="col-3 text-center">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="col-6">Turkish Coffee</td>
                                        <td class="col-3 px-0">
                                            <div class="input-group">
                                                <button class=" p-0 px-2" type="button">+</button>
                                                <input type="text" value="1" readonly class="form-control shadow-sm text-center p-0">
                                                <button class=" p-0 px-2" type="button">-</button>                                        
                                            </div>
                                        </td>
                                        <td class="col-3 text-center">$10.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12 p-1">
                                    <div class="input-group">
                                        <span class="input-group-text shadow-sm">Notes</span>
                                        <textarea class="form-control shadow-sm" aria-label="With textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-1">
                                    <div class="input-group">
                                        <span class="input-group-text shadow-sm" id="inputGroup-sizing-default">Room</span>
                                        <select class="form-select shadow-sm" aria-label="Default select example">
                                            <option selected>Select Room</option>
                                            <option value="1">R1</option>
                                            <option value="2">R2</option>
                                            <option value="2">R3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>   
                            <div class="row p-2">
                                <div class="col-8 px-3">
                                    <h5 class="m-0">Total</h5>
                                </div>
                                <div class="col-4 px-3">
                                    <p class="text-end m-0">$10.00</p>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-6 p-1">
                                    <button type="button" class="btn btn-primary w-100">Add New</button>
                                </div>
                                <div class="col-6 p-1">
                                    <button type="button" class="btn btn-success w-100">Confirm</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- JS Code -->
        <script>
            function addProductToBill(){
                console.log('add')
            }
        </script>

    </body>

</html>