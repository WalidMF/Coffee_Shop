<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coffee Shop - Forget password</title>

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
    
    <?php

        $emailerr = "";
        if (isset($_POST["reset"])){
            $email=$_POST["email"];
            //establish connection with db
            $con = new PDO('mysql:host=localhost;dbname=coffee_shop', 'root', '');
            $query = " SELECT email FROM users where email= '$email'; ";
            $sql = $con->prepare($query);
            $sql->execute();
            $alldata[] = $sql->fetchAll(PDO::FETCH_ASSOC);
            $user =$alldata[0];
            if($user){
                setcookie("email",$email);
                header('Location:Reset_password.php');
                die();
            }
            else{
                $emailerr = "Email doesn't match any";
            }
        }
    ?>

    <div class="m-0 p-2 h-100 w-100 d-flex">
        <!-- Main Section -->
        <div class="main_section_style w-100">
            <div class="card text-center shadow-lg p-1 mb-5 bg-body rounded" style="width: 350px; margin: auto auto; margin-top: 100px;">
                <div class="card-body px-4">
                    <div class="card-text py-2">
                        <div class="logo m-3 mb-5">
                            <img src="Assets/Images/wrong-password.png" alt="img not found" width="120" >
                        </div>
                        <form action="" method="post">
                            <label class="form-label fs-6">Please enter your email</label>
                            <input type="email" name="email" class="form-control mt-3 mb-1"  style="height: 50px;" placeholder="Please enter your email"/>
                            <div id="email-error" class="form-text text-danger ps-1"><?php echo $emailerr; ?></div>
                            <button type="submit" class="btn btn-primary w-100 my-3" name="reset" style="height: 50px;">Reset password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>