<?php

class Login_Model extends Model 
{
    
    public function __construct(){
        parent::__construct();
      
        
    }
    
    /*
    public function run(){
        
        $login = $_POST["login"];
        $password = $_POST["password"];

        
      $sth= $this->db->prepare('Select login from user where 
                       login  = :login and password = :password ;');
           
        //$sth= $this->db->prepare('select * from users');
        $sth->execute(array(
            ":login" => $login,
            ":password"=>$password
        ));
        // $sth->execute();
     
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $count = $sth->rowCount();
        
        if ($count > 0 ) {
           Session::init();
           Session::Set('Role',"admin");
            Session::Set('id',0);
            Session::Set('loginName',$data[0]["login"]);
           Session::Set('LoggedIn', true);
            header('location:'.$URL.'/dashboard');
            exit;
        }
        else
        {
      header('location:login');
        }
    
        }
}
    
*/
   public function run()
    {
        $login= $_POST['login'];
    $sth= $this->db->prepare('SELECT id_user, salt, password FROM USER WHERE LOGIN = :login');
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute(array(
        ':login'    =>  $login));
        
        $data = $sth->fetchAll();
        
          $count = $sth->rowCount();
          if($count > 0){
            
        //check password
            $salt= $data[0]['salt'];  
             $id_user= $data[0]['id_user'];  
            $passHash=$this->getPassHash(11,$salt,$_POST['password']);
              /*
              echo $_POST['password'];
              echo "<br>";
               echo $salt;
              echo "<br>";
           echo $data[0]['password'];
              echo "<br>";
           echo $passHash;
           */
            if ($data[0]['password']== $passHash){       
              Session::init();
           Session::Set('Role',"user");
            Session::Set('id',$id_user);
            Session::Set('loginName', $login);
           Session::Set('LoggedIn', true);
           header('location:'.$URL.'/listOfAppointments');
            exit;
                
            }
              else 
                   {header('location:login');
        }
        }
        //show an error!
           // header('location: ../login');
        
   }


   public function getPassHash($cost,$salt,$pass){
        $options = [
        'cost' => $cost,
        'salt' => $salt,
        ];
       //password_hash($pass, PASSWORD_BCRYPT, $options);
       //hash('sha512', $salt . $passwordInput);
        return hash('sha512', $salt . $pass);
    }
}

?>