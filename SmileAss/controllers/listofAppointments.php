<?php 

class listOfAppointments extends Controller {
    function __construct() {
        parent::__construct();
        
          $logged =Session::Get("LoggedIn");

   if($logged  == false)   {
       header ('location:../login');
        exit;
    }
        $this->view->js=array("/listOfAppointments/js/default.js"); 
    }
   
    function index(){
        
        $this->view->render("listOfAppointments/index");
    }
    
    function XHRgetBookingList(){
        $this->model->XHRgetBookingList();
    }
}

?>