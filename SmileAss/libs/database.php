<?php 

class Database extends PDO
{
    public function __construct(){
       $username ='root';
       $password ='';
       $servername ='localhost';
        parent::__construct(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, $username, $password);
      
    }
}

?>