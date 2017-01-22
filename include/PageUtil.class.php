<?php
require_once ('include/SmartyUtil.class.php');
class PageUtil {
	//标记0代表前台，1代表后台
	public static function getHeader($flag = 0) {
		$smarty = new SmartyUtil ( $flag );
		$smarty->assign ( "pageTitle", "ctosb Java并发 多线程 Spring Mybatis 分布式 - 做最好的技术分享" );
		return $smarty->fetch ( "header.ftl" );
	}
	public static function getFooter($flag = 0) {
		$smarty = new SmartyUtil ( $flag );
		return $smarty->fetch ( "footer.ftl" );
	}
	public static function getSidebar($flag = 0) {
		// 查询文章分类
		$articleClasses = ArticleClassController::getArticleClass ();
		$smarty = new SmartyUtil ( $flag ); // 建立smarty实例对象$smarty
		$smarty->assign ( "list", $articleClasses ); // 进行模板变量替换
		$smarty->assign ( "CLASS_URL", htmlspecialchars ( $_SERVER ["PHP_SELF"] . "?p=articleByClass&i=" ) );
		return $smarty->fetch ( "sidebar.ftl" );
	}
	public static function getNavbar($flag = 0) {
		$smarty = new SmartyUtil ( $flag );
		return $smarty->fetch ( "navbar.ftl" );
	}
}
?>