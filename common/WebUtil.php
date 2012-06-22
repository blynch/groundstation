<?php
/* 
	Class to generate the web views in the application
	Production for "static" files in web/
	Production for MVC view 

*/

class WebUtil {

	public static function startPage(&$ctx) {
		$ctx->path .= __METHOD__.";";
		$ctx->smarty = new CustomSmarty;

		// Start up the GZIP engine
		ob_start ("ob_gzhandler");

		// File headers
		header("Content-type: text/html; charset: UTF-8");

		// Set up the smarty object 



	}

	public static function displayPage(&$ctx) {
		$ctx->path .= __METHOD__.";";

		// Complete the process and display the object
		// Set the container template
		$masterTemplate = "body.tpl";



		// Display the template
		$ctx->smarty->display($masterTemplate);
			
	}

}

?>