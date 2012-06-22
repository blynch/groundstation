<?php


	class DefaultController {

		public function dispatch(&$ctx) {

			$requestURI = $ctx->requestURI;
			$ctx->path .= __METHOD__.";";

			if(strlen($requestURI) <= 1) {
				$view = new HomeView;
				$view->display($ctx);
			}
			else { // load the view for the page 


			}

		}

	};


?>