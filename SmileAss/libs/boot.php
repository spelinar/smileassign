<?php
// отвечает за навигацию страниц сайта 
class Boot
{
     function __construct()
     {
         
         if(isset($_GET['url'])){
        $url = rtrim($_GET['url']);
            
        $url = explode('/',$url); //делим строку полученного адресса на массив строк 
         }
         else
         {
              require "controllers/index.php";
            $controller = new Index();
             
             $url[0]='index';
             $controller->index();
             return false;
         }
             
        
       // print_r($url);

         $file= 'controllers/'.$url[0].'.php';
         
        
         if (file_exists($file))
         {
           
             require $file;
         }
         else {
             
             require "controllers/error.php";
             $controller = new Error();
             $controller->index(); 
            //throw new Exception("The file: $file "." Does not exists");
             return false;
         }
        
    $controller = new $url[0];
    $controller->loadModel($url[0]);
        
   
if (isset($url[1])) {
    
         if (!method_exists($controller,$url[1]))
           {
             header ('location:../login');
             exit;
           }
    
    if(isset($url[2])){
        //echo $url[2];
    $controller->{$url[1]}($url[2]);
        return false;
}
    

    $controller->{$url[1]}();
    return false;
}
       
           $controller->index(); 
         
     }
}

?>
