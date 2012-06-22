<?php


	class ApiController {

		function __construct() {}

		public function dispatch(&$ctx) {
			$requestURI = $ctx->requestURI;
			$ctx->path = $ctx->path . __METHOD__ . ";";

			echo "Dispatching response for the api controller: $requestURI";
		}

	};

?>