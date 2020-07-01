<?php



class Help extends Controller { 
function __construct(){
    parent::__construct();
    
   
}
 public function other($arg = false){
     
       
        $this->view->blach = $this->model->blach();
 
    }

    function index(){
        $this->view->render("help/index");
    }
}
?>