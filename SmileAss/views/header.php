<!doctype html>
<html>

<head>
    <title>Test</title>
    <meta charset="utf-8">
    
    
    
   
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>/public/css/default.css">
    <script src="<?php echo URL ?>/public/js/jQuery.js"> </script>
    <script src="<?php echo URL ?>/public/js/default.js"></script>
    
     <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <?php if(isset($this->js)){
            foreach($this->js as $js){
                
                echo  '<script src="'.URL.'/views'.$js.'"> </script>';
            }
    
}
           ?>

</head>

<body>

    <div id="header">
   
      <?php // print_r(Session::Get("Role")); ?>



        <?php if(Session::Get("LoggedIn") == true):  ?>
       
        <a href="<?php echo URL ?>/listOfAppointments">your appointments</a>
         <a href="<?php echo URL ?>/book">book Appointment</a>
        <a href="<?php echo URL ?>/dashboard/logout">logout[<?php echo Session::Get("loginName")?>]</a>
        
        <?php if(Session::Get("Role") == "admin"):  ?>
        
         <a href="<?php echo URL ?>/admin">admin panel</a>
        <? endif; ?>
        <?php  else: ?>
        <a href="<?php echo URL ?>/Registration">Registration</a>
        <a href="<?php echo URL ?>/login">login</a>
        
        <? endif; ?>
    </div>

    <div id="content">
