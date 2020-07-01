<?php

class Registration_Model extends Model{
    
    function __construct(){
         parent::__construct();
    }

     public function run()
    {
     $error_pass = false;
     $error_login= false;
    
        
     $login = $this->check_input($_POST['login']);
     $pass  = $this->check_input($_POST["password"]);
     $passAg= $this->check_input($_POST["password_again"]);
     
     $salt = $this->getSalt();
      
            
         if ($pass != $passAg)
             $error_pass =true;
         if ($this->error_login($login))
              $error_login =true;
        
        
        if (($error_pass == false) && ($error_login == false) ){
             
       $passHash = $this->getPassHash(11,$salt,$pass);
             
       $sth=  $this->db->prepare("insert into user(login,password,salt) VALUES(:login,:pass,:salt)");
       $sth->execute(array(':login'=>$login,':pass'=>$passHash,':salt'=> $salt ));
        
       
       
        }
         $data =array('errorPass'=>$error_pass,'errorLogin'=>$error_login,'salt'=>$salt );
       
       echo json_encode($data);
        
    }   
 

    
    public function error_login($log){
       $sth= $this->db->prepare('select login  from USER where login=:login ;');
       $sth->execute(array(':login'=> $log));
        
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
       if ($count > 0)
           return true;
       else 
           return false;
  }
    
   
   
    public function check_input($data) {
       
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    
    public function getSalt(){
       return uniqid(mt_rand(), true);
    }
    
    
    public function getPassHash($cost,$salt,$pass){
        $options = [
        'cost' => $cost,
        'salt' => $salt,
        ];
        //password_hash($pass, PASSWORD_BCRYPT, $options);
        //return hash('sha512', $salt . $passwordInput);
        return hash('sha512', $salt . $pass);
    }
    
    
    
}
?>









