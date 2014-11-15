<?php

switch (ZEAM_DEV_MODE) {
	
	case true:
		error_reporting(E_ALL);
		break;

	case false:
		error_reporting(0);
		break;

	default:
		die("Site mode not set.");
		break;

}

