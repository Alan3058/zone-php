<?php
header ( "Content-Type:text/html;   charset=utf-8" );
define ( "PROJECTPATH", dirname ( __FILE__ ) );

require_once 'autoLoad.php';
$userName = $password = "";
$errorInfo = "";
function getUserInfo() {
	// 查询文章
	$userInfo = SysUserController::getSysUserInfoByUserName ( LoginUtil::getSessionUser () );
	$smarty = new SmartyUtil ( 0 ); // 建立smarty实例对象$smarty
	$smarty->assign ( $userInfo ); // 进行模板变量替换
	$smarty->assign ( "sidebar", PageUtil::getSidebar () ); // 进行模板变量替换
	return $smarty->fetch ( "profile.ftl" );
}
if (isset ( $_GET ["a"] ) && $_GET ["a"] == "save") {
	// 如果提交请求
	$resultInfo = validateUserInfo ();
	if ($resultInfo->result) {
		$userName = LoginUtil::getSessionUser ();
		$nickName = Util::filterInputInfo ( $_POST ["nickName"] );
		$email = Util::filterInputInfo ( $_POST ["email"] );
		$mobile = Util::filterInputInfo ( $_POST ["mobile"] );
		$personalShow = Util::filterInputInfo ( $_POST ["personalShow"] );
		SysUser::updateSysUser ( "sssss", array (
				"NICK_NAME" => $nickName,
				"EMAIL" => $email,
				"MOBILE" => $mobile,
				"PERSONAL_SHOW" => $personalShow 
		), array (
				"USER_NAME" => $userName 
		) );
		print "操作成功";
	}
	// 拼接错误信息
	foreach ( $resultInfo->infos as $key => $value ) {
		$errorInfo .= $value . ",";
	}
	$errorInfo = substr ( $errorInfo, 0, strlen ( $errorInfo ) - 1 );
} else {
	print PageUtil::getHeader ();
	print PageUtil::getNavbar ();
	print getUserInfo ();
	print PageUtil::getFooter ();
}
/**
 * 校验用户信息
 *
 * @return Ambigous <boolean, ResultMessage>
 */
function validateUserInfo() {
	$resultInfo = new ResultInfo ();
	// 校验输入信息
	if (empty ( $_POST ["userName"] )) {
		$resultInfo->result = false;
		array_push ( $resultInfo->infos, "用户名不能为空" );
	}
	return $resultInfo;
}

?>
