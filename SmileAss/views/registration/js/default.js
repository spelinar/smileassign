

$(function () {
   
    $("#regForm").submit(function () {
        
        console.log("button pressed: ");
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.post(url, data, function (o) {
            
            console.log("error pass: "+  o.errorPass);
            console.log ("error login: "+ o.errorLogin);
              console.log ("salt: "+ o.salt);
            

            if (o.errorLogin) $('#loginErr').text("Login is already registered."); else $('#loginErr').text(" ") ;

             if (o.errorPass) $('#passErr').text("Passwords do not match."); else $('#passErr').text(" ");
             if(!(o.errorLogin)&& !(o.errorPass)) {
             alert("your registration is successful");
           setTimeout( 'location="../login";', 200 );
             }
        }, 'json');
        event.preventDefault();
        return false;
    });
    //login
    //Passwords do not match
    //This email or login is already registered
    //array('errorPass'=>$error_pass,'errorLogin'=>$error_login,'errorEmail'=>$error_email);
});