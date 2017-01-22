<?php
header ( "Content-Type:text/html; charset=utf-8" );
define ( "PROJECTPATH", dirname ( __FILE__ ) );

require_once "autoLoad.php";

if (! LoginUtil::checkSessionLogin ()) {
	// 用户未登录，重新登录
	return Util::redirect2Url("login.php",1.5,"未登录或者登录信息已过期，请先登录");
}

// 获取文件名称
$fileName = (! isset ( $_GET ["p"] ) || $_GET ["p"] == "" ? "index" : $_GET ["p"]);
?>

<?php print PageUtil::getHeader(1);?>
<?php print PageUtil::getNavbar(1);?>

<?php include 'admin/' . $fileName . '.php';?>

<?php print PageUtil::getFooter(1);?>
