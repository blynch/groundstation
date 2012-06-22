<?php

class MediaController {

	public function dispatch(&$ctx) {
		$ctx->path .= __METHOD__.";";
		$requestURI = $ctx->requestURI;
		$requestRoot = $ctx->requestRoot;

		switch($requestRoot) {
			case "/css":
				ob_start ("ob_gzhandler");
				header("Content-type: text/css; charset: UTF-8");
				break;
			case "/js":
				ob_start ("ob_gzhandler");
				header("Content-type: text/javascript; charset: UTF-8");
				break;
			case "/img":
				$extension = substr($requestURI, -3);
				$extension = strcmp($extension, "jpg") == 0 ? "jpeg" : $extension;
				header("Content-type: image/$extension");
				break;
		}

		//$filePath = substr($requestURI, 1);
		$filePath = "web".$requestURI;
		if(file_exists($filePath)) {
			require($filePath);
		}
		else 
			$ctx->log->error("File not found: $filePath");

	}
};

?>