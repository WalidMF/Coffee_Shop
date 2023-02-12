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
        <link rel="stylesheet" href="Assets/Styles/login.css">

    </head>

    <body>

    <?php
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
            
            if ( $password==$user[0]["password"])
            {
              if($user[0]["type"]=="admin")
              {
                header('Location:Admin_Home');
                die();
              }
              else
              {
                header('Location:User_Home');
                die();
              }
            }
            
            else
            {
                echo "<div class='alert alert-danger'>password isn't correct</div ";
            }
        
        }

        else
        {
            echo "<div class='alert alert-danger'>Email doesn't match any</div ";
        }
    }

    ?>

        
        <div class="m-0 p-2 h-100 w-100 d-flex">
            <!-- Main Section -->
            <div class="main_section_style w-100">
                
            <div class="fullpage">

                    <div class="box">

                     <div class="logo">
                         <img src="Assets/Images/coffie.jpg" alt="img not found">
                             </div>

    <div class="title">Coffee Shop</div>


    <div class="form">

        <form method="post" action="Login.php">
            <label>Email</label>
            <input type="text" placeholder="Enter your Email" name="email">
            <label>Password</label>
            <input type="password" placeholder="Enter your password" name="password">
            <span style="color: red;"></span>
            <button type="submit" name="login">login</button>
        </form>

    </div>

    <div class="forget">
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
<?php



?>