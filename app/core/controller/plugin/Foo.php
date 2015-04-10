<?php

class Foo extends Zend_Controller_Plugin_Abstract{
	
	public function routeStartup($request)
	{
		echo '<p>foo plugin routeStartup invoked....</p>';
	}
}