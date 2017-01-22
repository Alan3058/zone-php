<?php
header ( "Content-Type:text/html; charset=utf-8" );
// require_once (PROJECTPATH . '/include/SmartyUtil.class.php');

$smarty = new SmartyUtil ( 1 ); // 建立smarty实例对象$smarty
$smarty->display ( "versionInfo.ftl" );

?>
