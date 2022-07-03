<?php


include("Classes/Connection.php");
include("Classes/Login.php");
include("Classes/User.php");
include("Classes/Post.php");


if(isset($_SESSION['user_id'])){
    //get user id from sessoin
    $userId = $_SESSION['user_id'];

    //check if user logged in
    $login = new Login();
    $result = $login->checkLogin($userId);

    if($result){
        //user logged in -> get user data by User class(get_data method)
        $user = new User();
        $userData =$user -> get_data($userId);
        if(!$userData){
            header('Location:login.php');
            die;
        }

    }else{
        //user not logged in
        header('Location:login.php');
        die;
    }
}else{
    //if user id not set or not numeric
    header('Location:login.php');
    die;
}

// *************** posting ***************
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $post = new Post();
    $id = $_SESSION['user_id'];
    $result = $post->create_post($userId,$_POST);

    if($result ==""){
        header("Location:profile.php");
        die;
    }
    else{
        //something error
        echo "<div id='error'>";
        echo "<br>The following errors occured:<br><br>";
        echo $result;
        echo "</div>";
    }
}

//get posts from database
$post = new Post();
$posts = $post->getPosts();

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
    <title>Social Media</title>
</head>
<body>

<!--start nav bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand brand">Social Media</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText" style="flex-grow: 0;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="Classes/Logout.php">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link asignUp" href="profile.php" style="margin-inline-end:10px">My Profile</a>
          </li>
        </ul>

        <div class="flexPostForm">
            <div class="imgPostForm imgHead" >
                <a href="profile.php"><img src="img/<?php echo $userData['personal_picture'];?>" alt=""></a>
            </div>
            <div class="namePostCard">
                <p class="name"><?php echo $userData['first_name']." ".$userData['last_name'];?></p>
            </div>   
        </div>
    </div>
    </div>
</nav>
<!--end nav bar-->

<!--start content-->
<div class="container">
    <div class="postForm">
       <div class="flexPostForm">
        <div class="imgPostForm">
            <img src="img/<?php echo $userData['personal_picture'];?>" alt="">
        </div>
        <input data-bs-toggle="modal" data-bs-target="#exampleModal" class="form-control" type="text" placeholder="Type Your Post Here" aria-label=".form-control-lg example">
        <!-- create post -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--form _ create post-->
                <form method="post" enctype="multipart/form-data" action="">

                <div class="modal-body">

                    <textarea
                            name = "postContent"
                            class="form-control txtPostModal"
                            id="exampleFormControlTextarea1"
                            rows="3"
                            placeholder="Type your post here...">
                    </textarea>

                    <input name = "postImage" class="form-control" type="file" id="formFile">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input name ="btnPost" type="submit" class="btn btn-primary" value="POST">
                </div>

                </form>
            </div>
            </div>
        </div>
       </div>     
    </div>
    <!-- display post-->
    <div class="postCard">
        <div class="postForm">
            <div class="flexPostForm">
                <div class="imgPostForm">
                    <img src="img/man.jpg" alt="">
                </div>
                <div class="namePostCard">
                    <p class="name"><?php echo $userData['first_name']." ".$userData['last_name'];?></p>
                    <div class="divTime">
                        <i class="fa-solid fa-clock"></i>
                        <p>4h</p>
                    </div>
                </div>   
            </div>
            <div class="imgPost">
            <img src="img/business.jpg" class="img-fluid rounded" alt="...">
            </div>
            <div class="divNumComments">
                <i class="fa-solid fa-comment pNumComments"></i>
                <p class="pNumComments">22 Comments</p>
            </div>
            <div>
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/<?php echo $userData['personal_picture'];?>" alt="">
                    </div>
                    <input class="form-control" type="text" placeholder="Type your comment" aria-label=".form-control-lg example">
                </div>
            </div>
            <hr class="hr">
            <div class="comment">
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/<?php echo $userData['personal_picture'];?>" alt="">
                    </div>
                    <div class="boxComment">
                        <p class="nameBoxComment"><?php echo $userData['first_name']." ".$userData['last_name'];?></p>
                        <p class="contentBoxComment">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <div class="divTime">
                            <i class="fa-solid fa-clock"></i>
                            <p>4h</p>
                        </div>
                    </div>
                </div>
            </div>

       
    </div>
<!--end content-->

        <!-- display all posts -->
        <?php
        if($posts){
            foreach ($posts as $ROW){
                $user = new User();
                $ROW_USER=$user->get_data($ROW['user_id']);
                include("post.php");
            }

        }
        ?>
<!--Bootstrap 5 js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>