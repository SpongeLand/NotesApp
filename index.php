<?php

/*
 ________  _______   ________  _____ ______      
|\_____  \|\  ___ \ |\   __  \|\   _ \  _   \    
 \|___/  /\ \   __/|\ \  \|\  \ \  \\\__\ \  \   
     /  / /\ \  \_|/_\ \   __  \ \  \\|__| \  \  
    /  /_/__\ \  \_|\ \ \  \ \  \ \  \    \ \  \ 
   |\________\ \_______\ \__\ \__\ \__\    \ \__\
    \|_______|\|_______|\|__|\|__|\|__|     \|__|
                                                 
                                                 

Copyright 2014 Alphasquare.us
Licensed with the MIT license
http://github.com/Alphapixels/Zeam
http://labs.alphasquare.us

You can remove this, but we'd love you to death if you kept this here. 
Also, we'd marry you if you put a link back to Alphasquare.us.

*/

/**
*
* NotesApp
* @author Sergio Diaz
* @version 1.0.0
*
*/

# Bootstrap the system
include("system/start.php");
include("system/authentication.php");

# If sessvar is signed in equals boolean true, redirect.
$Core->requires_auth(false);

# Authentication class requires injection of instance for now.
$Auth = New Authentication($Core->instance);

if (isset($_POST['username']) and isset($_POST['password'])) {

	$user = $_POST['username'];
	$password = $_POST['password'];

	$auth = $Auth->authenticate($user, $password);

	if ($auth) {

		$_SESSION['loggedin'] = true;

	} else {

		$_SESSION['loggedin'] = false;
		$_SESSION['message'] = "Failed to sign in. Are your details correct?";

	}

}

if ($_SESSION['loggedin']) {

	$Core::redirect("dashboard.php");

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Alphasquare Labs - NotesApp">
    <meta name="author" content="Sergio Diaz">

    <title>NotesApp - Welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="app/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="app/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <div class="panel panel-default form-signin">
        <div class="panel-heading">
          <h3 class="panel-title">Please sign in</h3>
        </div>
        <div class="panel-body">
        <?php

        	if (isset($_SESSION['message'])) {

        		$msg = $_SESSION['message'];

        		unset($_SESSION['message']);

        		echo "<div class=\"alert alert-info\">$msg </div>";

        	}

        ?>
        	<form method="POST" action="">
	             <input type="text" name="username" class="form-control input-md" placeholder="Username">
	          	 <br>
	             <input type="password" name="password" class="form-control input-md" placeholder="Password">
	             <br>
	             <button class="btn btn-primary btn-block btn-lg" type="submit">Sign in</button>
            </form>

        </div>
      </div>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>






