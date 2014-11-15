<?php

class Design {

	public static function panel($array) {

		$panel = "
				<div class=\"panel panel-default\">
					<div class=\"panel-heading\">".$array['title'].":</div>
				  <div class=\"panel-body\">
				    ".$array['body']."
				  </div>
				  <div class=\"panel-footer\"><i>Posted ".$array['footer'].".</i></div>
				</div>
		";

		return $panel;

	}

}