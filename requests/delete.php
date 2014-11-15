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
include("../system/start.php");

# If sessvar is signed in equals boolean true, redirect.
$Core->requires_auth(true);

$Notes = New Notes($Core->instance);

$userid = $Notes->get_uid_from_post($id);

if ($id == $_SESSION['uid'] && is_numeric($_GET['id']) {

	$Notes->delete($id);

}



?>
