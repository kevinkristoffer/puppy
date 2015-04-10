<?php

class Puppy_Core_Controller_Plugin_Test extends Zend_Controller_Plugin_Abstract{
	
	public function routeStartup($request)
	{
		echo '<p>routeStartup invoked....</p>';
	}
	
	public function routeShutdown($request)
	{
		echo '<p>routeShutdown invoked....</p>';
	}
	
	public function dispatchLoopStartup($request)
	{
		echo '<p>dispatchLoopStartup invoked....</p>';
	}
	
	public function preDispatch($request)
	{
		echo '<p>preDispatch invoked....</p>';
	}
	
	public function postDispatch($request)
	{
		echo '<p>postDispatch invoked....</p>';
	}
	
	public function dispatchLoopShutdown()
	{
		echo '<p>dispatchLoopShutdown invoked....</p>';
	}
}

?>