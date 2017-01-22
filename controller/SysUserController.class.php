<?php
header ( "Content-Type:text/html; charset=utf-8" );
// require_once (PROJECTPATH . "/include/config.php");
// require_once (PROJECTPATH . "/include/MysqlUtil.class.php");
// require_once (PROJECTPATH . "/include/Util.class.php");
// require_once (PROJECTPATH . "/include/MysqlUtil.class.php");
// require_once (PROJECTPATH . "/include/ResultInfo.class.php");
class SysUserController {
	
	/**
	 * 获取用户信息
	 * @param unknown $userName
	 * @return Ambigous <boolean, unknown>
	 */
	public static function getSysUserInfoByUserName($userName) {
		// 查询文章
		$sql = "select USER.* from SYS_USER USER WHERE USER.USER_NAME = ?";
		$userInfos = DaoUtil::query ( $sql, "s", array (
				"USER_NAME" => $userName
		) );
		return $userInfos[0];
	}
	/**
	 * 校验用户是否存在
	 *
	 * @param unknown $userName        	
	 * @param unknown $password        	
	 * @return multitype:boolean multitype:
	 */
	public static function validateUserExist($userName, $password) {
		$sql = "select count(1) as num from SYS_USER where user_name=? and password = ? ";
		// 查询登录用户信息
		$resultInfo = new ResultInfo ();
		$result = DaoUtil::query ( $sql, "ss", array (
				$userName,
				$password 
		) );
		if ($result [0] ["num"] <= 0) {
			$resultInfo->result = false;
			array_push ( $resultInfo->infos, "用户名或密码错误" );
		}
		return $resultInfo;
	}
	
	/**
	 * 保存用户
	 *
	 * @param unknown $types        	
	 * @param unknown $array        	
	 * @return multitype:boolean multitype:
	 */
	public static function saveSysUser($types, $array) {
		return DaoUtil::save ( "SYS_USER", $types, $array );
	}
	/**
	 * 更新用户
	 *
	 * @param unknown $types        	
	 * @param unknown $array        	
	 * @return multitype:boolean multitype:
	 */
	public static function updateSysUser($types, $result, $condition) {
		return DaoUtil::update ( "SYS_USER", $types, $result, $condition );
	}
}
?>

