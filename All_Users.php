<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coffee Shop - Users</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <img src="Assets/Images/user.png" alt="User Picture" class="rounded-circle w-100">
                <h4 class="mt-2 m-0 text-light d-none d-lg-block text-center">User Name</h4>
                <h5 class="m-0 text-secondary d-none d-lg-block text-center">Admin</h5>
            </div>
            <div class="btn-group-vertical w-100 pt-4 pt-lg-1 p-2">
                <a href="Admin_Home.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-house mx-2"></i><span class="d-none d-lg-inline">Home</span></a>
                <a href="Add_Product.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-mug-saucer mx-1"></i><span class="d-none d-lg-inline">Products</span></a>
                <a href="All_Users.php" class="btn btn-outline-light text-start p-2 my-1 active"><i class="fa-solid fa-user mx-2"></i><span class="d-none d-lg-inline">Users</span></a>
                <a href="Admin_Orders.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-bag-shopping mx-2"></i><span class="d-none d-lg-inline">Orders</span></a>
                <a href="Cheeks.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-circle-check mx-2"></i><span class="d-none d-lg-inline">Cheeks</span></a>
                <a href="Login.php" class="btn btn-outline-light text-start p-2 my-1"><i class="fa-solid fa-right-from-bracket mx-2"></i><span class="d-none d-lg-inline">Sign Out</span></a>
            </div>
        </div>
        <!-- Main Section -->
        <div class="main_section_style m-0 p-3">

            <div class="containeer p-5">
                
                <div class="row mb-3">
                    <div class="col-8">
                        <h3 class="d-flex">All Users...</h3>
                    </div><div class="col-4 d-flex justify-content-end">
                        <a href="./Add_Users.php" class="btn btn-primary py-2 px-4">Add User</a> 
                    </div>
                </div>
                <table class="table table-hover mt-2 table table-striped">
                    <thead class=" fs-5">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Type</th>
                            <th scope="col">Room</th>                            
                            <th scope="col" class="text-center">Update</th>
                            <th scope="col" class="text-center">Delete</th>
                        </tr>
                    </thead>

                    <tbody class="bg-body">
                        <?php

                            $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
                            $query = "SELECT * FROM users;";
                            $sql = $con->prepare($query);
                            $sql->execute();
                            $alldata = $sql->fetchAll(PDO::FETCH_ASSOC);
                            foreach($alldata as $value){
                                $id=$value["id"];
                                $name=$value["name"];
                                $email=$value["email"];
                                $type=$value["type"];
                                $room=$value["room"];
                                $img = $value["picture"];
                                echo '<tr>
                                <td scope="row">'.$id.'</td>
                                <td scope="row">'. '<img src ="Assets/Images/Users/'.$img.'" class="rounded-circle"  width="50" height="50" >' .'</td>
                                <td scope="row">'.$name.'</td>
                                <td scope="row">'.$email.'</td>
                                <td scope="row">'.$type.'</td>
                                <td scope="row">'.$room.'</td>
                                <td scope="row" class="text-center">'.'<a href="Update_User.php?updateid='.$id.'" class="btn btn-primary">Update</a>' .'</td>
                                <td scope="row" class="text-center">'.'<a href="Delete_user.php?deleteid='.$id.'" class="btn btn-danger">Delete</a> '.'</td>';
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>