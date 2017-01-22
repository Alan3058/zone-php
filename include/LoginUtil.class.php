<?php
class LoginUtil {
	/**
	 * 检查session，判断用户是否已登录
	 *
	 * @return boolean
	 */
	public static function checkSessionLogin() {
		$user = self::getSessionUser ();
		if (isset ( $user )) {
			return true;
		}
		return false;
	}
	/**
	 * 保存数据到Session
	 *
	 * @param unknown $key        	
	 * @param unknown $data        	
	 */
	public static function saveData2Session($key, $data) {
		SessionUtil::saveSession ( $key, $data );
	}
	/**
	 * 获取session的用户信息
	 *
	 * @param string $key        	
	 * @return unknown
	 */
	public static function getSessionUser() {
		return SessionUtil::getSession ( "USER_NAME" );
	}
	/**
	 * 登出，销毁Session
	 *
	 * @param string $key        	
	 */
	public static function logoutUser($key = null) {
		SessionUtil::destroySession();
	}
}
?>