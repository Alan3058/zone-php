<?php
header ( "Content-Type:text/html;   charset=utf-8" );
define("PROJECTPATH", dirname(__FILE__));

require_once 'autoLoad.php';

if(LoginUtil::checkSessionLogin()){
	LoginUtil::logoutUser();
}
Util::redirect2Url("index.php");
?>