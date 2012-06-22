<?php 


class CustomSmarty extends Smarty {
   function __construct()
   {
        parent::__construct();

        $this->setTemplateDir('templates/');
        $this->setCompileDir('templates/compile/');
        $this->setConfigDir('templates/config/');
        $this->setCacheDir('templates/cache/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'AppName');
   }

};

?>
