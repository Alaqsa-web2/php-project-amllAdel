<?php

class Post{
    private $error = "";
    public function create_post($userId,$data)
    {
        if(!empty($data['postContent']))
        {
            $postContent = addslashes($data['postContent']);

            $postId = $this->createPostId();

            $query = "insert into posts(user_id,post_id,post_content) values ('$userId','$postId','$postContent')";
            $DB = new Database();
            $DB ->saveInDatabase($query);
             return $postId;
        }else{

            $this->error.="please type something to post!";
            return $this->error;

        }

    }//end create post

    //create post id --> random number
    public function createPostId(){
        $length=rand(4,19);
        $number = "";
        for ($i=0;$i<$length;$i++){
            $new_rand = rand(0,9);
            $number.=$new_rand;
        }
        return $number;
    }
    //end createPostId()

    //getPostsById --> to display posts in profile
    public function getPostsById($userId)
    {
        $query = "select * from posts where user_id = '$userId' order by id desc limit 10";
        $DB = new Database();
        $result = $DB ->readFromDatabase($query);
        if($result){
            return $result;
        }else{
            return false;
        }

    }

    //getPostsById --> to display posts in home page
    public function getPosts()
    {
        $query = "select * from posts";
        $DB = new Database();
        $result = $DB ->readFromDatabase($query);
        if($result){
            return $result;
        }else{
            return false;
        }

    }
}
?>