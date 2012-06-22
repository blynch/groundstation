<?php

	class UserController {

		function __construct() {}

		public function dispatch(&$ctx) {
			$requestURI = $ctx->requestURI;
			$ctx->path = $ctx->path . "UserController::dispatch;";


			$ctx->log->warn("reached the user controller");
			$ctx->log->debug("test");

			echo "Dispatching response for the user controller: $requestURI";
		}

	};

?>