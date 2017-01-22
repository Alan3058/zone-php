<?php
// header ( "Content-Type:text/html; charset=utf-8" );
// require_once ('controller/ArticleController.class.php');
// require_once (PROJECTPATH . '/controller/ArticleReplyController.class.php');
$action = (! isset ( $_GET ["a"] ) || $_GET ["a"] == "" ? "show" : $_GET ["a"]);
if ($action == "show") {
	// 添加文章访问记录
	ArticleAccessController::saveArticleClass("iss", array("ARTICLE_ID"=>$_GET ["i"],"ACCESS_TIME"=>date("Y-m-d H:i:s"),"ACCESS_IP"=>$_SERVER["REMOTE_ADDR"]));
	//输出文章内容
	print getUserInfo ();
} else if ($action == "saveReply") {
	if (md5 ( strtolower ( $_POST ["checkCode"] ) ) != SessionUtil::getSession ( "verification" )) {
		echo md5 ( strtolower ( $_POST ["checkCode"] ) );
		echo "验证码输入有误";
	} else {
		saveReply ();
	}
	//输出文章内容
	print getUserInfo ();
}
function getUserInfo() {
	// 查询文章
	$articles = ArticleController::getArticleInfoByArticleId ( $_GET ["i"] );
	foreach ( $articles as &$item ) {
		if ($item ["CLASS_NAME"] == "") {
			$item ["CLASS_NAME"] = "未分类";
		}
		if (isset ( $_GET ["a"] ) && $_GET ["a"] == "saveReply") {
			$item ["SAVE_REPLAY_URL"] = htmlspecialchars ( $_SERVER ["REQUEST_URI"] );
		} else {
			$item ["SAVE_REPLAY_URL"] = htmlspecialchars ( $_SERVER ["REQUEST_URI"] . "&a=saveReply" );
		}
	}
	$smarty = new SmartyUtil ( 0 ); // 建立smarty实例对象$smarty
	$smarty->assign ( $articles [0] ); // 进行模板变量替换
	$smarty->assign ( "articleReply", getReplayInfo () );
	$smarty->assign ( "sidebar", PageUtil::getSidebar () ); // 进行模板变量替换
	return $smarty->fetch ( "article.ftl" );
}
function saveReply() {
	$array = array ();
	$array ["ARTICLE_ID"] = $_GET ["i"];
	$array ["CONTENT"] = $_POST ["content"];
	$array ["REPLIER_NAME"] = $_POST ["replierName"];
	$array ["REPLIER_EMAIL"] = $_POST ["replierEmail"];
	$array ["CREATE_TIME"] = date ( "Y-m-d H:i:s" );
	ArticleReply::saveArticleReply ( "issss", $array );
}
function getReplayInfo() {
	$resultArray = ArticleReplyController::getArticleReplyByArticleId ( $_GET ["i"] );
	foreach ( $resultArray as &$item ) {
	}
	$smarty = new SmartyUtil ( 0 ); // 建立smarty实例对象$smarty
	$smarty->assign ( "list", $resultArray ); // 进行模板变量替换
	return $smarty->fetch ( "articleReply.ftl" );
}

?>
