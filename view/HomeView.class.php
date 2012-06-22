<?php
/*
	View for the default home page of the site

*/


  class HomeView {

  	public function display(&$ctx) {
  		$ctx->path .= __METHOD__.";";
  		$requestURI = $ctx->requestURI;


  		// Start the web transaction
  		WebUtil::startPage($ctx);

  
  		// Build the home content


  		// Build the content into smarty
  		$ctx->smarty->assign("test", "test");



  		// Complete the web transaction
  		WebUtil::displayPage($ctx);


  	}



  }



?>
