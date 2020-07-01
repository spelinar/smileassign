<?php 

class Info extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->js=array("/info/js/default.js");
        $logged =Session::Get("LoggedIn");
   if($logged  == false) {
       header ('location:../login');
        exit;
    } 
        
    }
   
    function index(){
        
        $this->view->render("info/index");
        
       
    }
    
    function xhrGetInfo(){
        $this->model->XHRgetInfo();
    }
    
     function XHRgetTicketList(){
    $this->model->XHRgetTicketList();
}
    
   function  buyTicket() {
       
       $this->model->buyTicket();
       
   }
    
    
    
    
}

   

?>