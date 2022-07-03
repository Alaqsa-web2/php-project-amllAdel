
<!-- display post-->
<div class="postCard">
    <div class="postForm">
        <div class="flexPostForm">
            <div class="imgPostForm">
                <img src= "img/<?php echo $userData['personal_picture'];?>" alt="">
            </div>
            <div class="namePostCard">
                <!--userName-->
                <p class="name"><?php echo $userData['first_name']." ".$userData['last_name']?></p>
                <div class="divTime">
                    <i class="fa-solid fa-clock"></i>
                    <p><?php echo $ROW['create_at']?></p>
                </div>
            </div>
        </div>


        <p style="padding: 15px 60px;"><?php echo $ROW['post_content']?></p>
        <br><br>

        <div class="imgPost">
            <img src="img/business.jpg" class="img-fluid rounded" alt="...">
        </div>

        <div class="divNumComments">
            <i class="fa-solid fa-comment pNumComments"></i>
            <p class="pNumComments">22 Comments</p>
        </div>

        <!-- create comments -->
        <div>
            <div class="flexPostForm">
                <div class="imgPostForm">
                    <img src="img/<?php echo $userData['personal_picture'];?>" alt="">
                </div>
                <form method="POST" enctype="multipart/form-data">
                <input name = "commentContent" class="form-control" type="text" placeholder="Type your comment" aria-label=".form-control-lg example">
                <input name = "btn_createComment" type = "submit" value = "comment">
                </form>
            </div>
        </div>
        <!--display comment-->
        <hr class="hr">
        <div class="comment">
            <div class="flexPostForm">
                <div class="imgPostForm">
                    <img src="img/<?php echo $userData['personal_picture'];?>" alt="">
                </div>
                <div class="boxComment">
                    <p class="nameBoxComment">aml</p>
                    <p class="contentBoxComment">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    <div class="divTime">
                        <i class="fa-solid fa-clock"></i>
                        <p>4h</p>
                    </div>
                </div>
            </div>
        </div>


    </div></div>


<!--end content-->