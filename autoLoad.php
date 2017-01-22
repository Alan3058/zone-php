<?php
function autoLoad($className) {
	if ((strpos ( $className, "Smarty" ) !== false)) {
		$fileName = "smarty/Smarty.class.php";
	} elseif ((strpos ( $className, "Controller" ) !== false)) {
		$fileName = "controller/" . $className . ".class.php";
	} else {
		$fileName = "include/" . $className . ".class.php";
	}
	return require_once $fileName;
}

spl_autoload_register ( "autoLoad" );
?>