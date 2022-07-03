<?php

class Comment{
    private $error = "";

    public function create_comment($userId,$post_id,$data)
    {
        if(!empty($data['commentContent']))
        {
            $commentContent = addslashes($data['commentContent']);

            $commentId = $this->createCommentId();

            $query = "insert into comments(user_id,comment_id,comment_content , post_id) values ('$userId','$commentId','$commentContent',$post_id)";
            $DB = new Database();
            $DB ->saveInDatabase($query);

        }else{
            $this->error.="please type something to comment!";
        }
        return $this->error;

    }//end create comment


    public function getCommentsByPostId($userId ,$PostId)
    {
        $query = "select * from comments where user_id = '$userId' && post_id = '$PostId'order by id desc limit 10";
        $DB = new Database();
        $result = $DB ->readFromDatabase($query);
        if($result){
            return $result;
        }else{
            return false;
        }

    }

    //create post id --> random number
    public function createCommentId(){
        $length=rand(4,19);
        $number = "";
        for ($i=0;$i<$length;$i++){
            $new_rand = rand(0,9);
            $number.=$new_rand;
        }
        return $number;
    }
    //end createPostId()

}
?>