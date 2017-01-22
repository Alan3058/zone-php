<?php
header ( "Content-Type:text/html; charset=utf-8" );
// require_once (PROJECTPATH . '/controller/ArticleClassController.class.php');

$action = (! isset ( $_GET ["a"] ) || $_GET ["a"] == "" ? "show" : $_GET ["a"]);
if ($action == "show") {
	show ();
} else if ($action == "delete") {
	deleteArticleClass ();
	show ();
} else if ($action == "save") {
	batchSaveArticleClass ();
	show ();
}
function show() {
	// 查询文章分类
	$resultArray = ArticleClassController::getArticleClass();
	$smarty = new SmartyUtil ( 1 ); // 建立smarty实例对象$smarty
	$smarty->assign ( "list", $resultArray ); // 进行模板变量替换
	$smarty->assign ( "SAVE_ARTICLECLASS_URL", $_SERVER ["PHP_SELF"] . "?p=articleClass&a=save" ); // 进行模板变量替换
	$smarty->assign ( "sidebar", PageUtil::getSidebar (1) ); // 进行模板变量替换
	$smarty->display ( "articleClass.ftl" );
}
function deleteArticleClass() {
	$result = ArticleClassController::deleteArticleClass ( "i", array (
			"ID" => $_GET ["i"] 
	) );
	if ($result) {
		Util::redirect2Url ( htmlspecialchars ( $_SERVER ["PHP_SELF"] . "?p=articleClass" ) );
	}
}
function batchSaveArticleClass() {
	$idArray = $_POST ["id"];
	for($i = 0; $i < count ( $idArray ); $i ++) {
		$id = $idArray [$i];
		if ($id == null || $id == "") {
			$result = ArticleClassController::saveArticleClass ( "s", array (
					"CLASS_NAME" => $_POST ["className"] [$i] 
			) );
		} else {
			$result = ArticleClassController::updateArticleClass ( "si", array (
					"CLASS_NAME" => $_POST ["className"] [$i] 
			), array (
					"ID" => $id 
			) );
		}
	}
	Util::redirect2Url ( htmlspecialchars ( $_SERVER ["PHP_SELF"] . "?p=articleClass" ) );
}

?>
