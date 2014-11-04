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
* Zeam Starter
* @author Sergio Diaz
* @version 1.0.0
*
*/

// Include main core file.

include("core.php");

// Start system, fire away!

try {

	$configs = array(
		'name' => 'NotesApp', 
		'version' => '1.0.0', 
		'baseurl' => '/',
		'app_mode' => true
		);

	$Core = New Core($configs);

	include("zeam/checks.php");

} catch (Exception $e) {

		if (ZEAM_DEV_MODE) {

			echo $e->getMessage;

		}

}

try {

	$Core->init_db("notes", "localhost", "root", "");

} catch (Exception $e) {

	if (ZEAM_DEV_MODE) {

			echo $e->getMessage;

	}

}

include("app/custom.php");

# -------------------------------------------------------------------

# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
#  And away we go, deep into the oceans, sailing deep into the code!
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

# -------------------------------------------------------------------


