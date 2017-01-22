<?php
class SmartyUtil extends Smarty {
	function __construct($flag) {
		parent::__construct ();
		if ($flag == 0) {
			$this->setTemplateDir ( 'content/ftl/' );
			$this->setCompileDir (  'temp/content/templates_c/' );
			$this->setConfigDir ( 'temp/content/configs/' );
			$this->setCacheDir (  'temp/content/cache/' );
		} else {
			$this->setTemplateDir ( 'admin/ftl/' );
			$this->setCompileDir ( 'temp/admin/templates_c/' );
			$this->setConfigDir ( 'temp/admin/configs/' );
			$this->setCacheDir ( 'temp/admin/cache/' );
		}
		$this->setLeftDelimiter ( "{{" );
		$this->setRightDelimiter ( "}}" );
		$this->setCompileCheck ( true );
		$this->setForceCompile ( true );
		
		$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
		$this->assign ( 'appName', 'zone' );
	}
}

?>