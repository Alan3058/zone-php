<?php
header ( "Content-Type:text/html; charset=utf-8" );
// require_once (PROJECTPATH . '/controller/ArticleController.class.php');
// require_once (PROJECTPATH . '/controller/ArticleClassController.class.php');

$action = (! isset ( $_GET ["a"] ) || $_GET ["a"] == "" ? "show" : $_GET ["a"]);
if ($action == "show") {
	show ();
} else if ($action == "saveArticle") {
	saveArticle ();
	show ();
}
function show() {
	// 查询文章
	$articles = ArticleController::getArticleInfoByArticleId ( $_GET ["i"] );
	// 查询文章分类
	$articleClasses = ArticleClassController::getArticleClass ();
	$smarty = new SmartyUtil ( 1 ); // 建立smarty实例对象$smarty
	$smarty->assign ( "list", $articleClasses ); // 进行模板变量替换
	if (isset ( $_GET ["a"] ) && $_GET ["a"] == "saveArticle") {
		$smarty->assign ( "SAVE_ARTICLE_URL", htmlspecialchars ( $_SERVER ["REQUEST_URI"] ) ); // 进行模板变量替换
	} else {
		$smarty->assign ( "SAVE_ARTICLE_URL", htmlspecialchars ( $_SERVER ["REQUEST_URI"] . "&a=saveArticle" ) ); // 进行模板变量替换
	}
	$smarty->assign ( $articles [0] ); // 进行模板变量替换
	$smarty->display ( "articleEdit.ftl" );
}
function saveArticle() {
	$array = array ();
	$array ["AUTHOR"] = LoginUtil::getSessionUser ();
	$array ["TITLE"] = $_POST ["title"];
	$array ["CLASS_ID"] = $_POST ["classId"];
	$array ["CONTENT"] = $_POST ["content"];
	if (isset ( $_POST ["isPublic"] )) {
		$array ["IS_PUBLIC"] = $_POST ["isPublic"];
	} else {
		$array ["IS_PUBLIC"] = 0;
	}
	if (isset ( $_POST ["isPublish"] )) {
		$array ["IS_PUBLISH"] = $_POST ["isPublish"];
	} else {
		$array ["IS_PUBLISH"] = 0;
	}
	$array ["MODIFY_TIME"] = date ( "Y-m-d H:i:s" );
	if (isset ( $_POST ["id"] ) && $_POST ["id"] != "") {
		ArticleController::updateArticle ( "ssissssi", $array, array (
				"ID" => $_POST ["id"] 
		) );
	} else {
		$array ["CREATE_TIME"] = date ( "Y-m-d H:i:s" );
		ArticleController::saveArticle ( "ssisssss", $array );
	}
}
?>
