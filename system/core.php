<?php
session_start();
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
* Zeam core
* @author Sergio Diaz
* @version 1.0.0
*
*/

/* Include all required files for successful run */

include("configs/constants.php");
include("zeam/modules.php");
include("zeam/globals.php");

if (!isset($_SESSION['loggedin'])) {

	$_SESSION['loggedin'] = false;

}

class Core {

	public $db;
	public $instance;

	public function __construct($options = array()) {

		if (is_array($options)) {

			foreach ($options as $key => $val) {
				$this->var_create($key, $val);
			}

			define('ZEAM_DEV_MODE', $options['app_mode']);

		}

	}

	public function requires_auth($req = true) {

		if ($req == true & $_SESSION['loggedin'] !== true) {

			$this->redirect('index.php');

		}

	} 


	public function var_create($name, $value) {

		$this->{$name} = $value;

	}

	public function authenticate($user, $password) {

		
		
	}

	public function init_db($dbname, $host, $user, $password) {

		// Initialize Database.

		include("zeam/database.php");

		$this->db = New Database;

		$status = $this->db->load_db($dbname, $host, $user, $password);

		if ($status) {

			$this->instance = $this->db->get_instance();

		}

	}

	public static function get_app_mode() {

		return ZEAM_DEV_MODE;

	}

	public static function redirect($location) {

		header("Location: ".$location);

	}

}

