<?php
header ( "Content-Type:text/html; charset=utf-8" );
// require_once (PROJECTPATH . '/controller/ArticleController.class.php');
// require_once (PROJECTPATH . '/controller/ArticleClassController.class.php');
// require_once (PROJECTPATH . '/include/Util.class.php');
// require_once (PROJECTPATH . '/include/SmartyUtil.class.php');
// require_once (PROJECTPATH . '/include/PageUtilAdmin.class.php');

$action = (! isset ( $_GET ["a"] ) || $_GET ["a"] == "" ? "show" : $_GET ["a"]);
if ($action == "show") {
	show ();
}
function show() {
	// 查询文章
	$articles = ArticleController::getArticleInfoByClassId($_GET ["i"] );
	foreach ( $articles as &$item ) {
		if ($item ["CLASS_NAME"] == "") {
			$item ["CLASS_NAME"] = "未分类";
		}
		$item ["CONTENT"] = Util::substring ( preg_replace ( "/<[^>]+>/", "", $item ["CONTENT"] ) );
		$item ["ARTICLE_EDIT_URL"] = htmlspecialchars ( $_SERVER ["PHP_SELF"] . "?p=articleEdit&i=" . $item ["ID"] );
		$item ["VIEW_ARTICLE_URL"] = "admin.php?p=article&i=" . $item ["ID"];
	}
	$smarty = new SmartyUtil ( 1 ); // 建立smarty实例对象$smarty
	$smarty->assign ( "list", $articles ); // 进行模板变量替换
	$smarty->assign ( "sidebar", PageUtil::getSidebar (1) ); // 进行模板变量替换
	$smarty->display ( "articleByClass.ftl" );
}

?>
