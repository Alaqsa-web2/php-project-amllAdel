<?php
session_start();

class Login{
    private $error = "";

    //validate if user exist
    public function evaluate($data)
    {

        //get user data
        $email=addslashes($data['email']);
        $password=addslashes($data['password']);


        //insert user
        $query = "select * from users where email='$email' limit 1";

        //upload user data to db
        $DB = new Database();
        $result = $DB ->readFromDatabase($query);

        if ($result){
            $row = $result[0];
            if($password == $row['password']){
               //create session data
                $_SESSION['user_id']=$row['user_id'];
            }
            else{
                $this->error.="Wrong password<br>";

            }
        }else{
            $this->error.="No such email was found<br>";
        }
        return $this->error;

    }//end evalution

    public function checkLogin($userId){
        //insert user
        $query = "select user_id from users where user_id='$userId' limit 1";

        //upload user data to db
        $DB = new Database();
        $result = $DB ->readFromDatabase($query);

        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

}

?>