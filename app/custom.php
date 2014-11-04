<?php

class Notes {

	protected $instance;

	public function __construct($inst) {

		// inject
		$this->instance = $inst;

	}

	public function get_notes($uid = null) {

		if ($uid == null) {

    		$query = $this->instance->query("SELECT * FROM notes");

    	    while ($note_arr = $query->fetch_array()) {

				echo $note_arr['content'];
				echo "<br>";

			}

		}

	}

}