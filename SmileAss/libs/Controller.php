<?php


// подгружает нужную модель
// подгружает нужное предсавление

class Controller{
    
    function __construct() 
    {
        //echo "Main controller<br>";
        $this->view =new View(); // подгружаем видок
    }
    
    public function loadModel($name){
        $path = 'models/'.$name.'_model.php'; 
        
        if(file_exists($path)){
            require $path;
            $modelName = $name.'_model';
            
            $this->model = new $modelName; //подгружается модель
        }
        else echo "model don't exist";
        
    }
}
?>