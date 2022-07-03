<?php
class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "socialwebsite";

    function connectToDatabase()
    {
        $connection = mysqli_connect($this->host,$this->username,$this->password,$this->dbName);
        return $connection;
    }//end connectToDatabase()


    function readFromDatabase($query)
    {
        $conn = $this->connectToDatabase();
        $result = mysqli_query($conn,$query);
        if($result)
        {
            $data=false;
            while($row = mysqli_fetch_assoc($result))
            {
             $data[] = $row;
            }
            return $data;
        }
        else
        {
            return false;
        }
    }//end readFromDatabase()


    function saveInDatabase($query)
    {
        $conn = $this->connectToDatabase();
        $result = mysqli_query($conn,$query);
         if($result){
             return true;
         }else{
             return false;
         }
    }//end saveInDatabase( )

}//end Database class


?>