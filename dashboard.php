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

# If sessvar is signed in equals boolean true, redirect.
$Core->requires_auth(true);

$Notes = New Notes($Core->instance);

$username = $Notes->get_username($_SESSION['uid']);

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Alphasquare Labs - NotesApp">
    <meta name="author" content="Sergio Diaz">

    <title>NotesApp - Dash</title>

    <!-- Bootstrap core CSS -->
    <link href="app/css/bootstrap.min.css" rel="stylesheet">

	<link href="app/css/dash.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container" id="post-bar">

    <div class="page-header">
  		<h1>Hello, <?php echo $username; ?> <small>welcome back to NotesApp</small></h1>
	</div>
		<form method='post' class="form-inline" id="postbar">

		<input id="pst" name='content' class="post statusi" placeholder="Write something... ">

		</form>

    	<div class="row">

		<div id="posts">
		</div>
		</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="app/js/bootstrap.min.js"></script>
		<script>

		function fetch(){

		$.get('fetch.php?data=posts',function(data){

		  $("#posts").html(data);

		});



		    setTimeout("quasar();",1000);

		}



		window.onload = fetch();


			$("#postbar").submit(function() {



			    $.ajax({

			           type: "POST",

			           url: 'create.php',

			           data: $("#postbar").serialize(), // serializes the form's elements.

			           beforeSend: function(){

			           $('#pst').prop('disabled', true);

			           },

			           success: function(data)

			           {

			            $.get('fetch.php?data=posts',function(data){

			             $("#posts").html(data);

			            });       

			            $('#pst').prop('disabled', false);

			            $('#pst').val('');

			           }

			         });



			    return false; // avoid to execute the actual submit of the form.

			});
		</script>
    </body>
</html>

