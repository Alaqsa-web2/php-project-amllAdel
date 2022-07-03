<?php

class User{

    public function get_data($user_id){
       $DB = new Database();
       $query = "select * from users where user_id ='$user_id' limit 1 ";
       $result = $DB -> readFromDatabase($query);
       if($result){
           $row = $result[0];
           return $row;
       }else{
           return false;
       }
    }

}
?>