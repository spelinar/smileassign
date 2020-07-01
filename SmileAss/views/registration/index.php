<img class="mainIcon" src="<?php echo URL ?>/public/img/ico.png" alt="Trulli" width="500" height="333">
<h1>Create Account</h1>


<form id="regForm" action="/registration/run" method="post">
   
        <input class ='input' type="text" name = "login"    placeholder="login">
        <div class="error" id="loginErr"></div>
        <input class ='input' type="password" name = "password"  placeholder="password ">
        <input class ='input' type="password" name = "password_again"  placeholder="retry password">
        <div class="error" id="passErr"></div>
               
               <input  class="Button" type="submit" value="REGISTR">
       
    
    
    
</form>

<div id="errorShow"></div>


