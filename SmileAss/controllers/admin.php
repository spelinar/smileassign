<?php 
class Admin extends Controller
{
function __construct(){
 parent::__construct();
    
$logged =Session::Get("LoggedIn");
   
$role = Session::Get("Role");
   if(($logged  == false) || ($role!= "admin"))  {
       header ('location:../login');
        exit;
    } 
    
}
    
    function index() 
    {
      
        $this->view->render("admin/index");
       
    }
   

}

?>