<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Coffee Shop - Login</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Page icon -->
        <link rel="shortcut icon" href="Assets/Images/icon.png" type="image/x-icon">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="Assets/Styles/style_main.css">
        <link rel="stylesheet" href="Assets/Styles/login_style.css">

    </head>

    <body>

        <?php

        $emailerr = "";
        $passerr = "";
        if (isset($_POST["login"])){
            $email=$_POST["email"];
            $password=$_POST["password"];
            //establish connection with db
            $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
            $query = " SELECT * FROM users where email= '$email'; ";
            $sql = $con->prepare($query);
            $sql->execute();
            $alldata[] = $sql->fetchAll(PDO::FETCH_ASSOC);
            $user =$alldata[0];
            if($user){
                if ( $password==$user[0]["password"]){
                    if($user[0]["type"]=="admin"){
                        setcookie("user_id",$user[0]["id"]);
                        header('Location:Admin_Home');
                        die();
                    }
                    else{
                        setcookie("user_id",$user[0]["id"]);
                        header('Location:User_Home');
                        die();
                    }
                }
                else{
                    $passerr = "password isn't correct";
                }
            }
            else{
                $emailerr = "Email doesn't match any";
            }
        }

        ?>

        
        <div class="m-0 p-2 h-100 w-100 d-flex">
            <!-- Main Section -->
            <div class="main_section_style w-100 py-4">
                <div class="mt-5 w-100 h-75 d-flex justify-content-center">
                    <div class="box p-4 mb-5 bg-body shadow-lg shadow-lg rounded">

                        <div class="d-flex justify-content-center mb-3">
                            <img src="Assets/Images/login.png" alt="img not found" width="120" height="120">
                        </div>

                        <form method="post" action="Login.php">
                            <div class="mb-4">
                                <label for="email" class="form-label ">Email</label>
                                <input type="email" class="form-control py-2" placeholder="Enter your Email" name="email">
                                <div id="email-error" class="form-text text-danger ps-1"><?php echo $emailerr; ?></div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control py-2" placeholder="Enter your password" name="password">
                                <div id="pass-error" class="form-text text-danger ps-1"><?php echo $passerr; ?></div>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary mb-2 w-100 py-2">Login</button>
                        </form>

                        <div class="d-flex justify-content-center mb-1">
                            <label><a href="./Forget_Password.php">Forgot password?</a></label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>