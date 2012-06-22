<?php

// Environment mapping
define ('_DEVELOPMENT', "development");
define ('_PRODUCTION', "production");
define ('_QA', "qa");

// Set up the paths
$path = get_include_path();
$path .= ":config/";
$path .= ":controller";
$path .= ":model";
$path .= ":view";
$path .= ":common";
$path .= ":common/ext";
set_include_path($path);

// Smarty Template Configuration
define ('SMARTY_DIR', 'common/ext/Smarty/libs/');
include_once(SMARTY_DIR . 'Smarty.class.php');

include('log4php/Logger.php');

// Set up the auto load function
function globalautoload($class_name) {
  $result = @include_once($class_name . '.class.php');
  if($result === false) {
    include_once($class_name.'.php');
  }
}

class Configuration
{
	private $config;
	function __construct($environment= "", $script = false) {
		$this->initialize($environment, $script);

	}

	private function initialize($environment = "", $script = false) {

		$serverName = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : "";

		$this->config = require_once("config.inc");
		$this->config['_PRODUCTION'] = stripos($serverName, "dev") === false ? false : true;

		if($this->config['_PRODUCTION'] === false) {
			$developmentConfig = require_once("config.development.inc");
			$this->config = array_merge($this->config, $developmentConfig);
			Logger::configure("config/log4php.dev.xml");
		}
		else 
			Logger::configure("config/log4php.prod.xml");

		$serverName = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : "";

		$this->config['_ROUTES'] = require_once('routes.inc');

		define('BASE_URL', "http://".$serverName);
		define('SECURE_URL', "https://".$serverName);


		spl_autoload_register('globalautoload');
	}

	public static function getInstance($environment = "", $script = false) {
		$configuration = new Configuration();
		$configuration->initialize($environment ,$script);
		return $configuration;
	}

  	public function get($key) {
	    if(isset($this->config[$key]) === false) {
	      return null;
	    }
	    return $this->config[$key];
  	}
};



?>
