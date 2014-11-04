<?php

class Authentication {

	protected $instance;

	public function __construct($db) {

		$this->instance = $db;

	}

	public function authenticate($username, $password) {

		$hash = crypt($password, md5(sha1("hello")));

		$query = $this->instance->prepare("SELECT userid, password FROM users WHERE username=? LIMIT 1");
		$query->bind_param("s", $username);
		$query->execute();
    	$result = $query->get_result();
    	$row = $result->fetch_array(MYSQLI_ASSOC);

    	if ($row['password'] == $hash) {

    		$_SESSION['uid'] = $row['userid'];
    		return true;

    	} else {

    		return false;

    	}

	}

}