<?php
header ( "Content-Type:text/html; charset=utf-8" );
require_once (PROJECTPATH . "/controller/ArticleController.class.php");
require_once (PROJECTPATH . "/controller/ArticleClassController.class.php");
require_once (PROJECTPATH . "/include/Util.class.php");
function getIndex() {
	// 查询文章
	$articles = ArticleController::getPublicArticleInfo();
	foreach ( $articles as &$item ) {
		if ($item ["CLASS_NAME"] == "") {
			$item ["CLASS_NAME"] = "未分类";
		}
		$item ["CONTENT"] = Util::substring ( preg_replace ( "/<[^>]+>/", "", $item ["CONTENT"] ) );
		$item ["VIEW_ARTICLE_URL"] = "index.php?p=article&i=" . $item ["ID"];
		$item ['ARTICLE_URL'] = $_SERVER ["PHP_SELF"] . "?p=article&i=" . $item ["ID"];
	}
	
	$smarty = new SmartyUtil ( 0 ); // 建立smarty实例对象$smarty
	$smarty->assign ( "list", $articles); //进行模板变量替换
	$smarty->assign ( "sidebar", PageUtil::getSidebar () ); // 进行模板变量替换
	return $smarty->fetch ( "index.ftl" );
}

print getIndex ();
?>
