<?php

class Notes {

	protected $instance;

	public function __construct($inst) {

		// inject
		$this->instance = $inst;

	}

	public function get_notes($uid = null) {

		include("extras/design.php");

		$Design = New Design;

		if ($uid == null) {

    		$query = $this->instance->query("SELECT * FROM notes ORDER BY time DESC");

    	    while ($note_arr = $query->fetch_array()) {

				$paneldata = array(
					'body' => htmlentities($note_arr['content']),
					'title' => htmlentities($note_arr['username']),
					'footer' => $this->timeago($note_arr['time'])
					);
				echo '<div class="note">';
				echo $Design::panel($paneldata, true);
				echo '</div>';

			}

		}

	}

	public function get_username($uid) {

		$query = $this->instance->prepare("SELECT username FROM users WHERE userid=? LIMIT 1");
		$query->bind_param("s", $uid);
		$query->execute();
    	$result = $query->get_result();
    	$row = $result->fetch_array(MYSQLI_ASSOC);

    	return htmlentities($row['username']);

	}

	public function create($array = array()) {

		$query = $this->instance->prepare("INSERT into notes (content, username, time) VALUES (?, ?, ?)");
		$query->bind_param("ssi", $array['content'], $array['username'], $array['time']);
		$query->execute();
    	$result = $query->get_result();
    	$row = $result->fetch_array(MYSQLI_ASSOC);			

	}

	// function from http://stackoverflow.com/questions/1416697/converting-timestamp-to-time-ago-in-php-e-g-1-day-ago-2-days-ago, thanks!

	function timeago($ptime)
	{
	    $etime = time() - $ptime;

	    if ($etime < 1)
	    {
	        return '0 seconds';
	    }

	    $a = array( 365 * 24 * 60 * 60  =>  'year',
	                 30 * 24 * 60 * 60  =>  'month',
	                      24 * 60 * 60  =>  'day',
	                           60 * 60  =>  'hour',
	                                60  =>  'minute',
	                                 1  =>  'second'
	                );
	    $a_plural = array( 'year'   => 'years',
	                       'month'  => 'months',
	                       'day'    => 'days',
	                       'hour'   => 'hours',
	                       'minute' => 'minutes',
	                       'second' => 'seconds'
	                );

	    foreach ($a as $secs => $str)
	    {
	        $d = $etime / $secs;
	        if ($d >= 1)
	        {
	            $r = round($d);
	            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
	        }
	    }
	}

}