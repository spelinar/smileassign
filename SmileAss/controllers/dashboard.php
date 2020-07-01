<?php 
class Dashboard extends Controller
{
function __construct(){
 parent::__construct();
//echo "session: ".Session::Get("LoggedIn"). "  ??? ";
$logged =Session::Get("LoggedIn");
   if($logged  == false) {
       header ('location:../login');
        exit;
    } 
     $this->view->js=array("/dashboard/js/default.js");
}
   
    
    
    function index() 
    {
      
        $this->view->render("dashboard/index");
      //  echo Session::get("loggedIn");
       
    }
    function run(){
        $this->model->run();
    }
    
    
    function logout()
    {
        //echo "here";
        Session::destroy();
        header ('location:../login');
     exit;
    }

    function xhrInsert(){
        
        $this->model->xhrInsert();
        
    }
    
    function xhrGetListings(){
        $this->model->xhrGetListings();
    }
    
    function xhrDel(){
        if (isset($_POST['id'])){
            $id = $_POST['id'];
        $this->model->xhrDel($id);
        };
        
    }
    
}

?>