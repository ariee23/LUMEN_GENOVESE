<?php



/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| First we need to get an application instance. This creates an instance
| of the application / container and bootstraps the application so it
| is ready to receive HTTP / Console requests from the environment.
|
*/

$app = require __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$app->run(); ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

/* ... il resto del tuo file ...  */
?>
<?php //session_start(); ?>
<!DOCTYPE html>
<html>
<head>
 <title>Login form</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
 
</head>
<body>
 <div class="container">
 <div class="row mt-5">
 <div class="col-6 align-self-center">
 <h2>Login Form</h2>
 <hr>
 <form>
 <div class="form-group">
 <div class="form-group row">
 <label  class="col-sm-2 col-form-label">Username</label>
 <div class="col-sm-10">
 <input type="text" class="form-control" id="txtuser" value="">
 </div>
 </div>
 </div>
 <div class="form-group">
 <div class="form-group row">
 <label  class="col-sm-2 col-form-label">Password</label>
 <div class="col-sm-10">
 <input type="password" class="form-control" id="txtpass" value="" autocomplete="on">
 </div>
 </div>
 </div>
 <button type="button" id="btnlogin" class="btn btn-primary mb-2">Login</button>
 <a role="button" href="register.php"  class="btn btn-primary mb-2 float-right active">Register</a>
 
 </form>
 <div class="alert hidden informasi" role="alert"  ></div>
 </div>
 </div>
 </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"  ></script>
<script src="sha256.js"></script>

<script type="text/javascript">
 $(document).ready(function(){

 $("#btnlogin").click(function(){

    //prendo input utente
     var ajax = {
      
        email : $("#txtuser").val(),
       password:$("#txtpass").val()
     }
     $.ajax({
         url: "/api/login",//url chiamata rest
         type: "POST", // tipo chiamata rest
         data: ajax, // dati della rest : email , password


         success: function(data, textStatus, jqXHR)
           {   
               
          var ajax = { data : data }
        
              // ajax autenticazione riuscita, mostra dashboard.
              $.ajax({
                url: "/set_authenticate.php",
                type: "POST",
                data: ajax,
                //successo--> mostra
                success: function(data, textStatus, jqXHR)
                {
                 window.location.replace("dashboard.php");
                 return false;
                },
                error: function (request, textStatus, errorThrown) {
                console.log(request);
                }
              });
            },
 error: function (request, textStatus, errorThrown) {
    // alert(errorThrown+ textStatus);
     console.log(errorThrown);
 //$(".informasi").removeClass("hidden").addClass('alert-danger').html("errore");
 }



 });
 });
 });
</script>
</html>