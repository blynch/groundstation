<?php 

class CustomSmarty extends Smarty {
   function __construct(&$ctx)
   {
        parent::__construct();

      	$current = getcwd();
      	$base = str_replace("web", "", $current);
        if($ctx->configuration->get("SMARTY_APC")) {
          $this->setCachingType('apc'); 
          $this->setCaching(true);
        }

        if($ctx->configuration->get("_SMARTY_DISABLE_WRITES")) {
          $this->registerResource('file', new RecompilingFileResource());
        }
        $this->setTemplateDir($base.'templates/');
        $this->setCompileDir($base.'templates/compile/');
        $this->setConfigDir($base.'templates/config/');
        $this->setCacheDir($base.'templates/cache/');
        // $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'AppName');
   }

};

?>
