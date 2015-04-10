<?php

class Baz extends Zend_Controller_Plugin_Abstract{
	
	public function routeStartup($request)
	{
		echo '<p>baz plugin routeStartup invoked....</p>';
	}
}
