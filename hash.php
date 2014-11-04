<?php

include("system/core.php");

echo crypt($_GET['str'], md5(sha1("hello")));

	unset($_SESSION['loggedin']);