<?php
include("Classes/Connection.php");
include("Classes/Login.php");

$email="";
$password="";

if($_SERVER['REQUEST_METHOD'] =="POST"){
    $login = new Login();
    $result = $login->evaluate($_POST);

    if($result != ""){
        //something error
        echo "<div id='error'>";
        echo "<br>The following errors occured:<br><br>";
        echo $result;
        echo "</div>";
    }
    else{
        //no error
        header("Location:profile.php");
        die;
    }

    $email = $_POST['email'];
    $password=$_POST['password'];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap 5 css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--style-->
    <link rel="stylesheet" href="css/style.css">
    <title>login</title>
</head>
<body>
    <main class="form-signin">
        <form method="POST" enctype="multipart/form-data" action="">
        <a href="index.php">
            <h1 class="brand">Social Media</h1>
        </a>
          <h1 class="h3 mb-3 fw-normal">Please Login</h1>
          <!--Email-->
          <div class="form-floating">
            <input name = "email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>

            <!--Password-->
            <div class="form-floating">
            <input name = "password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
      
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
            <!-- Go to sign up -->
            <div class="checkbox mb-3">
                <a class="linksignup" href="signup.php">Don't have account go to Signup</a>
            </div>
            <!--btn_login-->
            <button name = "btn_login" class="w-100 btn btn-lg btnLogin" type="submit">Login</button>
        </form>
    </main>

    <!--Bootstrap 5 js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>