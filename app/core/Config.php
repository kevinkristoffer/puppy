<?php
require_once 'Zend/Loader.php';

class Puppy_Core_Config {
	
	/**
	 * Load Ini configuration
	 * @param unknown $directory
	 * @param unknown $file
	 * @return unknown
	 */
	public static function loadIniConfig($directory, $file)
	{
		$cachedConfigFile = $directory . $file . '.php';
		$configIniFile = $directory . $file;
		if (! file_exists ( $cachedConfigFile ) || filemtime ( $cachedConfigFile ) < filemtime ( $configIniFile ))
		{
			Zend_Loader::loadClass ( 'Zend_Config_Ini' );
			$config = new Zend_Config_Ini ( $configIniFile, APPLICATION_ENV );
			file_put_contents ( $cachedConfigFile, '<?php ' . PHP_EOL . 'return ' . var_export ( $config->toArray (), true ) . ';' );
		}
		$config = require ($cachedConfigFile);
		
		return $config;
	}
	
	public static function loadXmlConfig($directory,$file){
		
	}
}

?>