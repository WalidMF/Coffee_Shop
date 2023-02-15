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
        $user_id = 1;
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

        // get categorys from database
        $query = "SELECT * FROM category";
        $sql = $conn->prepare($query);
        $sql->execute();
        $all_cate = $sql->fetchAll(PDO::FETCH_ASSOC);

        
        ?>
 
        
        <div class="m-0 p-3 h-100 w-100 d-flex">
            <!-- Right Side Section -->
            <div class="right_side_style pe-3 pt-3 pt-lg-2">
                <div class="user_info_style p-lg-4"> 
                    <img src="Assets/Images/Users/<?php echo $user_pic; ?>" alt="User Picture" class="rounded-circle w-100" >
                    <h4 class="mt-2 m-0 text-light d-none d-lg-block text-center"><?php echo $user_name; ?></h4>
                    <h5 class="m-0 text-secondary d-none d-lg-block text-center">ADMIN</h5>
                </div>
                <div class="btn-group-vertical w-100 pt-4 pt-lg-1 p-2">
                    <a href="Admin_Home.php" class="btn btn-outline-light text-start p-2 my-1 active"><i class="fa-solid fa-house mx-2"></i><span class="d-none d-lg-inline">Home</span></a>
                    <a href="Add_Product.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-mug-saucer mx-1"></i><span class="d-none d-lg-inline">Products</span></a>
                    <a href="All_Users.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-user mx-2"></i><span class="d-none d-lg-inline">Users</span></a>
                    <a href="Admin_Orders.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-bag-shopping mx-2"></i><span class="d-none d-lg-inline">Orders</span></a>
                    <a href="Cheeks.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-circle-check mx-2"></i><span class="d-none d-lg-inline">Cheeks</span></a>
                    <a href="Login.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-right-from-bracket mx-2"></i><span class="d-none d-lg-inline">Sign Out</span></a>
                </div>
            </div>
            <!-- Main Section -->
            <div class="main_section_style m-0 p-3">
                <div class="row h-100">
                    <div class="col-8">
                        <div class="row w-100 m-0">
                            <div class="col-4 ps-0">
                                <select class="form-select fs-6 shadow p-2 ps-3 mb-4 bg-body" id="select-category">
                                    <option value="0" selected>All Products</option>
                                    <?php foreach($all_cate as $cate){ ?>
                                        <option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-8 ps-0">
                                <div class="input-group w-100">
                                    <input type="search" id="search_input" class="form-control fs-6 shadow p-2 ps-3 mb-4 bg-body" placeholder="Search" />
                                    <button type="button" id="search_button" class="btn btn-primary fs-6 shadow p-2 mb-4"><i class="fas fa-search px-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0" id="products_menu">
                            <div class="row w-100 m-0 mb-3">
                                <!-- Display Products -->
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
                                        <input type="text" readonly  id="bill_no" class="form-control shadow-sm" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 p-1">
                                    <div class="input-group">
                                        <span class="input-group-text shadow-sm" id="inputGroup-sizing-default">User</span>
                                        <input type="text" readonly class="form-control shadow-sm" value="<?php echo $user_name; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row h-50">
                                <div style=" max-height: 280px; overflow: auto;">
                                <table id="bill_table" class="table" >
                                    <thead class="sticky-top bg-body ">
                                        <tr>
                                            <th class="col-6">Name</th>
                                            <th class="col-3 text-center">Quant</th>
                                            <th class="col-3 text-center">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bill_table_rows">
                                        <!-- display bill rows -->
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-1">
                                    <div class="input-group">
                                        <span class="input-group-text shadow-sm">Notes</span>
                                        <textarea class="form-control shadow-sm" id="notes_id" aria-label="With textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-1">
                                    <div class="input-group">
                                        <span class="input-group-text shadow-sm" id="inputGroup-sizing-default">Room</span>
                                        <select class="form-select shadow-sm" id="room_id" aria-label="Default select example">
                                            <option value="0" selected>Select Room</option>
                                            <option value="R1">R1</option>
                                            <option value="R2">R2</option>
                                            <option value="R3">R3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>   
                            <div class="row p-2">
                                <div class="col-8 px-3">
                                    <h5 class="m-0">Total</h5>
                                </div>
                                <div class="col-4 px-3">
                                    <p class="text-end m-0">$<span id="total_id">0</span>.00</p>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-6 p-1">
                                    <button type="button" id="add_new_bill" class="btn btn-primary w-100">Add New</button>
                                </div>
                                <div class="col-6 p-1">
                                    <button type="button" class="btn btn-success w-100" id="save_bill">Confirm</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <!-- JS Code -->
        <script>

            // get products by category id
            function getProductsByCatId(cat_id) {
                $.ajax({
                    url: "Assets/API/api_user_home.php",
                    method: "POST",
                    data: {
                        cate_id: cat_id
                    },
                    success: function(data) {
                        $("#products_menu>.row").html(data);
                    }
                });
            }

            // search products
            function searchProducts(str) {
                $.ajax({
                    url: "Assets/API/api_user_home.php",
                    method: "POST",
                    data: {
                        input: str
                    },
                    success: function(data) {
                        $("#products_menu>.row").html(data);
                    }
                });
            }

            //display bill rows
            function displayBillRows(bil) {
                $.ajax({
                    url: "Assets/API/api_user_home.php",
                    method: "POST",
                    data: {
                        bill: bil
                    },
                    success: function(data) {
                        $("#bill_table_rows").html(data);
                    }
                });
            }

            // add new bill button
            function addNewBill() {
                $.ajax({
                    url: "Assets/API/api_user_home.php",
                    method: "POST",
                    data: {
                        new_bill: true
                    },
                    success: function(data) {
                        $("#bill_no").val(data);
                        displayBillRows(data);
                    }
                });
                $("#notes_id").val("");
                $("#room_id").val("0");
            }

            // save bill button
            function saveBill(notes, room, total, order_id) {
                
                $.ajax({
                    url: "Assets/API/api_user_home.php",
                    method: "POST",
                    data: {
                        save_bill: true,
                        notes: notes,
                        room: room,
                        total: total,
                        order_id: order_id
                    },
                    success: function(data) {
                        addNewBill();
                    }
                });
            }

            // main js code
            $(document).ready(function(){
                // get products by category id
                getProductsByCatId('0');
                //display bill rows
                var bill_n = $("#bill_no").val();
                displayBillRows(bill_n);
                // get products by category id
                $("#select-category").change(function(){
                    var cat_id = $(this).val();
                    getProductsByCatId(cat_id);
                    $("#search_input").val("");
                });
                // search products
                $("#search_button").click(function(){
                    var input = $("#search_input").val();
                    if($("#search_input").val() == ""){
                        getProductsByCatId('0');
                        $("#select-category").val("0");
                    }
                    else{
                        searchProducts(input);
                        $("#select-category").val("0");
                    }
                });
                // add new bill button
                $("#add_new_bill").click(function(){
                    addNewBill();
                });
                // save bill button
                $("#save_bill").click(function(){
                    var notes = $("#notes_id").val();
                    var room = $("#room_id").val();
                    var total = $("#total_id").text();
                    var order_id = $("#bill_no").val();
                    if(order_id != 0 && total != 0){
                        saveBill(notes, room, total, order_id);
                    }
                });
            });

            // change Product quantity in database
            function changeProductCount(user_id, product_id, order_id, p) {
                $.ajax({
                    url: "Assets/API/api_user_home.php",
                    method: "POST",
                    data: {
                        user_id: user_id,
                        product_id: product_id,
                        order_id: order_id,
                        quantity: p
                    },
                    success: function(data) {
                        var bill_n = $("#bill_no").val();
                        displayBillRows(bill_n);
                    }
                });
            }

            // add quantity to product
            function plusNum(ths) {
                var p = ths.nextElementSibling.value;
                p++;
                ths.nextElementSibling.value = p;
                var user_id = <?php echo $user_id ?>;
                var order_id = $("#bill_no").val();
                // var order_id = 1;
                var product_id = $(ths).val();
                changeProductCount(user_id, product_id, order_id, p)      
            }

            // minus quantity to product
            function minusNum(ths) {
                var p = ths.previousElementSibling.value;
                if(p>0){
                    p--;
                    ths.previousElementSibling.value = p; 
                    var user_id = <?php echo $user_id ?>;
                    var order_id = $("#bill_no").val();
                    // var order_id = 1;
                    var product_id = $(ths).val();
                    changeProductCount(user_id, product_id, order_id, p)
                }
            }

            // add product to bill button
            function addProductToBill(ths) {
                var user_id = <?php echo $user_id ?>;
                var product_id = ths.value;
                var order_id = $("#bill_no").val();
                if(order_id != 0){
                    $.ajax({
                        url: "Assets/API/api_user_home.php",
                        method: "POST",
                        data: {
                            p_product_id: product_id,
                            p_user_id: user_id,
                            p_order_id: order_id
                        },
                        success: function(data) {
                            var bill_n = $("#bill_no").val();
                            displayBillRows(bill_n);
                        }
                    });
                }
            }


        </script>

    </body>

</html>