<?php

  require_once('config/Configuration.php');

  $config = new Configuration();

  // Create a context to inject into the request (dependency injection vs. Singletons)
  $ctx = new Context();
  $ctx->configuration = $config;

  $log = Logger::getLogger("appname");
  $ctx->log = $log;

  // Grab the incoming url
  $requestURI = $_SERVER['REQUEST_URI'];

  $routes = $config->get("_ROUTES");

  $position = strpos($requestURI, "/", 1);
  if($position)
  	$requestRoot = substr($requestURI, 0, $position);
  else
  	$requestRoot = $requestURI;

  $ctx->requestURI = $requestURI;
  $ctx->requestRoot = $requestRoot;

  $ctx->path = "router.php;";

  $checkURI = "web".$requestURI;
  if(array_key_exists($requestRoot, $routes)) {
    $class = $routes[$requestRoot];
    $controller = new $class;
    $controller->dispatch($ctx);

  }
  else if(strlen($requestURI) > 1 && file_exists($checkURI)) {
    require($checkURI);
  }
  else { // Hand it off to the default handler
    $controller = new DefaultController;
    $controller->dispatch($ctx);
  }

  //$ctx->log->warn("Path followed: ".$ctx->path);

  
?>
