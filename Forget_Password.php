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
                header('Location:Reset_password');
                die();
          }

          else
              {
                echo "<div class='alert alert-danger'>Email doesn't match any</div >";
              }
            
            
            
        }

     
    ?>

    <div class="m-0 p-2 h-100 w-100 d-flex">
        <!-- Main Section -->
        <div class="main_section_style w-100">

            <div class="card text-center" style="width: 500px; margin: auto auto; margin-top: 50px; border-radius: 10px;">
                <div class="card-header h5 text-white bg-primary">
                    <h2>Coffee Shop</h2>
                </div>

                <div class="card-body px-5">
                    <div class="card-text py-2">

                        <div class="logo">
                            <img src="Assets/Images/coffie.jpg" alt="img not found"
                                style="width: 80%;height: 200px;border-radius: 50%;">
                        </div>
                        
                        <form action="" method="post">

                  
                        <label class="form-label text-primary">Please enter your email</label>
                        <input type="email" name="email" class="form-control my-3"  style="height: 50px;" placeholder="Please enter your email"/>
                            
                        <button type="submit" class="btn btn-primary w-100 " name="reset" style="height: 50px;">Reset password</button>
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