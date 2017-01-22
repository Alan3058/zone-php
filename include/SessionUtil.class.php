<?php
class SessionUtil {
	/**
	 * 保存数据到Session
	 *
	 * @param unknown $key        	
	 * @param unknown $data        	
	 */
	public static function saveSession($key, $data) {
		if (! isset ( $_SESSION )) {
			session_start ();
		}
		// 注册登录成功的用户信息
		$_SESSION [$key] = $data;
	}
	/**
	 * 获取session信息
	 *
	 * @param string $key        	
	 * @return unknown
	 */
	public static function getSession($key = null) {
		if (! isset ( $_SESSION )) {
			session_start ();
		}
		return $_SESSION [$key];
	}
	/**
	 * 销毁Session
	 *
	 * @param string $key        	
	 */
	public static function destroySession($key = null) {
		if (! isset ( $_SESSION )) {
			session_start ();
		}
		if ($key != null) {
			unset ( $_SESSION [$key] );
		} else {
			session_destroy ();
		}
	}
}
?>