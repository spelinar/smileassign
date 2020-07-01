<?php 

class book extends Controller {
    function __construct() {
        parent::__construct();
          $logged =Session::Get("LoggedIn");
$role = Session::Get("Role");
   if($logged  == false)   {
       header ('location:../login');
        exit;
      
    } 
       $this->view->js=array("/book/js/default.js"); 
    }
   
    function index(){
        
        $this->view->render("book/index");
    }
     
    function xhrGetListings(){
        $this->model->xhrGetListings();
    }
    
   
     function xhrGetListDoctor($a){
        $this->model->xhrGetListDoctor($a);
    }
    
    function xhrGetTimeList($a)
    {
        $this->model->xhrGetTimeList($a);
    }
    function booking()
    {
       
        $this->model->booking($_POST["id_doctor"],$_POST["hour"],$_POST["day"],$_POST["month"],$_POST["year"]);
       // $this->model->booking();
    }
    

    
}

?>