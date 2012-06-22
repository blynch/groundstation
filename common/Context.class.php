<?php

	class Context {

		private $configuration;
		private $requestURI;
		private $requestRoot;
		private $path;
		private $log;
		private $smarty;

		function __construct() {
			$configuration = array();
			$requestURI = "";
		}

  		public function __get($property) {
		    if (property_exists($this, $property)) {
		      return $this->$property;
		    }
  		}

  		public function __set($property, $value) {
		    if (property_exists($this, $property)) {
		      $this->$property = $value;
		    }
		}
		
		
	}

?>