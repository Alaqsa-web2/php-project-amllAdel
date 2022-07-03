<?php
include("Classes/Connection.php");
include("Classes/SignUp.php");

$firstName ="";
$lastName = "";
$gender = "";
$email="";

if($_SERVER['REQUEST_METHOD'] =="POST"){
    $signUp = new Signup();
    $result = $signUp->evaluate($_POST);

    if($result != ""){
        //something error
      echo "<div id='error'>";
      echo "<br>The following errors occured:<br><br>";
      echo $result;
      echo "</div>";
    }
    else{
        //no error
        header("location:index.php");
        die;
    }

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];




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
    <title>Sign up</title>
</head>
<body>
    <main class="form-signin">
        <form method="POST" enctype="multipart/form-data" action="">
            <a href="index.php">
              <h1 class="brand">Social Media</h1>
            </a>
          <h1 class="h3 mb-3 fw-normal">Register Now</h1>

            <!-- first name-->
          <div class="form-floating">
            <input  name ="firstName" type="text" class="form-control" id="floatingInputFirstName" placeholder="firstName">
            <label for="floatingInputFirstName">First name</label>
          </div>

            <!-- last name-->
            <div class="form-floating">
                <input  name = "lastName" type="text" class="form-control" id="floatingInputLastName" placeholder="lastName">
                <label for="floatingInputLastName">Last name</label>
            </div>

            <!--Email-->
            <div class="form-floating">
            <input  name = "email" type="email" class="form-control" id="floatingInputEmail" placeholder="email">
            <label for="floatingInputEmail">Email address</label>
          </div>

            <!--password-->
            <div class="form-floating">
            <input name = "password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            </div>


            <!-- gender -->
            Gender :
            <select name = "gender" id="text">
                <option>Female</option>
                <option>Male</option>
            </select>
            <br><br>

            <!--select file => personal photo-->
            <div class="form-floating">
                Add personal photo
                <input type="file" id="floatingConfirmPersonalPicture"  name="personalPicture" required><br><br>
            </div>

            <!-- Go to Login -->
            <div class="checkbox mb-3">
                <a class="linksignup" href="login.php">I Have Account Go to Login</a>
            </div>
            <!--sign up-->
            <button  class="w-100 btn btn-lg btnLogin" type="submit">Sign up</button>
        </form>
    </main>

    <!--Bootstrap 5 js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>