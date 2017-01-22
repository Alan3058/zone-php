<?php
header ( "Content-Type:text/html;   charset=utf-8" );
define("PROJECTPATH", dirname(__FILE__));

require_once 'autoLoad.php';

Util::redirect2Url("index.php",1.5,"暂未开放注册功能，请关注升级版本功能。。。");
exit();

$userName = $password = $cpassword = "";
$errorInfo = "";
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	// 如果提交请求
	$resultInfo = validateUserInfo ();
	if ($resultInfo->result) {
		$userName = Util::filterInputInfo ( $_POST ["userName"] );
		$password = Util::filterInputInfo ( md5($_POST ["password"]) );
		$resultInfo = saveUser ( $userName, $password );
		if ($resultInfo->result) {
			// 验证通过后，将用户信息保存到session中
			LoginUtil::saveData2Session ("USER_NAME",$userName);
			// 跳转到首页
			Util::redirect2Url ( "index.php" );
			exit ();
		}
	}
	// 拼接错误信息
	foreach ( $resultInfo->infos as $key => $value ) {
		$errorInfo .= $value . ",";
	}
	$errorInfo = substr ( $errorInfo, 0, strlen ( $errorInfo ) - 1 );
}
function validateUserInfo() {
	$resultInfo = new ResultInfo ();
	// 校验输入信息
	if (empty ( $_POST ["userName"] )) {
		$resultInfo->result = false;
		array_push ( $resultInfo->infos, "用户名不能为空" );
	}
	if (empty ( $_POST ["password"] )) {
		$resultInfo->result = false;
		array_push ( $resultInfo->infos, "密码不能为空" );
	}
	if (empty ( $_POST ["cpassword"] )) {
		$resultInfo->result = false;
		array_push ( $resultInfo->infos, "确认密码不能为空" );
	} else {
		if ($_POST ["password"] != $_POST ["cpassword"]) {
			$resultInfo->result = false;
			array_push ( $resultInfo->infos, "两次密码不一致" );
		}
	}
	return $resultInfo;
}
function saveUser($userName, $password) {
	$resultInfo = new ResultInfo ();
	// 保存用户信息
	$result = SysUserController::saveSysUser ( "ss", array (
			"USER_NAME" => $userName,
			"PASSWORD" => $password 
	) );
	if ($result) {
		$resultInfo->result = true;
	}
	return $resultInfo;
}

?>
<?php print PageUtil::getHeader();?>
<?php print PageUtil::getNavbar();?>
	<div class="container">
		<div class="row">
			<form class="col-md-6 col-md-offset-3 form-horizontal"
				action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
				method="post">
				<div class="form-group">
					<h3 class="text-center">会员注册</h3>
					<span class="col-sm-offset-2 error"><?php echo $errorInfo?></span>
				</div>
				<div class="form-group">
					<label class="control-label sr-only">用户名</label>
					<div class="col-sm-12">
						<input type="text" name="userName" class="form-control input-lg"
							placeholder="用户名" required value="<?php echo $userName?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label sr-only">密码</label>
					<div class="col-sm-12">
						<input type="password" name="password"
							class="form-control input-lg" placeholder="密码" required
							value="<?php echo $password?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label sr-only">确认密码</label>
					<div class="col-sm-12">
						<input type="password" name="cpassword"
							class="form-control input-lg" placeholder="确认密码" required
							value="<?php echo $cpassword?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary btn-block" value="注册" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<p class="text-info">
							<a href="login.php">已有帐号，请登录</a>
						</p>
					</div>
				</div>

			</form>
		</div>

	</div>
<?php print PageUtil::getFooter();?>