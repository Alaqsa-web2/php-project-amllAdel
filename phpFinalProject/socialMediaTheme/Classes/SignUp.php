<?php
class Signup{

     private $error = "";
    //evaluate --> validate user input
    public function evaluate($data)
    {
        foreach ($data as $key => $value){

            //check if empty field exist
            if(empty($value))
              $this->error .=$key ."is empty !<br>";

            //check if first name is  text
            if($key=="firstName"){
                if(is_numeric($value))
                    $this->error .="First name can't be a number<br>";

            }
            //check if last name is not text
            if($key=="lastName"){
                if(is_numeric($value))
                    $this->error .="Last name can't be a number<br>";
            }

            }

          if($this->error ==""){
            //no error
              $this->createUser($data);
          }
          else{
              return $this->error;
          }

    }//end evaluate()

    //create new user --> insert it into db
    public function createUser($data)
    {
     //get user data
        $first_name= $data['firstName'];
        $last_name= $data['lastName'];
        $gender=$data['gender'];
        $email=$data['email'];
        $password=$data['password'];

        //create these
        $user_id = $this->createUserId();
        $url_address = strtolower("$first_name")."." .strtolower("$last_name");

        //get photo
        $temp = $_FILES['personalPicture']['tmp_name'];
        $name = $_FILES['personalPicture']['name'];
        $arr = explode('.',$name);
        $ext = end($arr);
        $currentDir = getcwd()."\\img\\$name";
        move_uploaded_file($temp,$currentDir);



      //insert user
     $query = "insert into users
               (user_id,first_name,last_name,gender,email,password,url_address,personal_picture)
               values('$user_id','$first_name','$last_name','$gender','$email','$password','$url_address','$name')";

     //upload user data to db
     $DB = new Database();
     $DB ->saveInDatabase($query);
    }//end createUser


    //create user id --> random number
    private function createUserId(){
        $length=rand(4,19);
        $number = "";
        for ($i=0;$i<$length;$i++){
            $new_rand = rand(0,9);
            $number.=$new_rand;
        }
        return $number;
    }//end createUserId()
}//end class
?>