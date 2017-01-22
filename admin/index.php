<?php
header ( "Content-Type:text/html; charset=utf-8" );
// require_once (PROJECTPATH . "/controller/ArticleController.class.php");
// require_once (PROJECTPATH . "/controller/ArticleClassController.class.php");
// require_once (PROJECTPATH . "/include/Util.class.php");

// 查询文章
$articles = ArticleController::getArticleInfo();
foreach ( $articles as &$item ) {
	if ($item ["CLASS_NAME"] == "") {
		$item ["CLASS_NAME"] = "未分类";
	}
	$item ["CONTENT"] = Util::substring ( preg_replace ( "/<[^>]+>/", "", $item ["CONTENT"] ) );
	$item ["VIEW_ARTICLE_URL"] = "admin.php?p=article&i=" . $item ["ID"];
}
$smarty = new SmartyUtil ( 1 ); // 建立smarty实例对象$smarty
$smarty->assign ( "list", $articles ); // 进行模板变量替换
$smarty->assign ( "ARTICLE_NEW_URL", htmlspecialchars ( $_SERVER ["PHP_SELF"] ) . "?p=articleEdit&i=-1" ); // 进行模板变量替换
$smarty->assign ( "sidebar", PageUtil::getSidebar (1) ); // 进行模板变量替换
$smarty->display ( "index.ftl" );
?>
