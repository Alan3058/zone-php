<?php
require_once "config.php";
class MysqlUtil {
	/**
	 * 默认查询
	 *
	 * @return unknown
	 */
	public static function getConnect() {
		// 创建连接
		$dbConnect = mysqli_connect ( DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT );
		// 检查连接是否异常
		if (mysqli_connect_errno ()) {
			exit ( mysqli_connect_error () );
		}
		
		return $dbConnect;
	}
	public static function excute($sql, $types = null, $conditionArray = null, $dbConnect = null) {
		// 构建连接
		if ($dbConnect == null) {
			$dbConnect = self::getConnect ();
		}
		// 判断需要预处理语句
		if ($types == null || $conditionArray == null) {
			return mysqli_query ( $dbConnect, $sql );
		}
		// 进行预处理执行
		// 构建参数
		$params = self::buildParam ( $types, $conditionArray );
		// 创建mysql stmt对象
		$stmt = mysqli_stmt_init ( $dbConnect );
		if (mysqli_stmt_prepare ( $stmt, $sql )) {
			call_user_func_array ( array (
					$stmt,
					"bind_param" 
			), self::refValues ( $params ) );
			$executeResult = mysqli_stmt_execute ( $stmt );
			$result = mysqli_stmt_get_result ( $stmt );
			mysqli_stmt_close ( $stmt );
			mysqli_close ( $dbConnect );
			// 获取影响行数
			// $effectRow = mysqli_stmt_affected_rows ( $stmt );
			if (is_bool ( $result )) {
				// 如果是更新和插入和删除，则返回是否执行成功
				return $executeResult;
			}
			// 如果是查询则返回查询结果集
			return $result;
		}
		return false;
	}
	
	/**
	 * 查询
	 *
	 * @param unknown $dbConnect        	
	 * @param unknown $sql        	
	 */
	public static function query($sql, $types = null, $conditionArray = null, $dbConnect = null) {
		return self::excute ( $sql, $types, $conditionArray, $dbConnect );
	}
	public static function insert($sql, $types = null, $conditionArray = null, $dbConnect = null) {
		return self::excute ( $sql, $types, $conditionArray, $dbConnect );
	}
	public static function delete($sql, $types = null, $conditionArray = null, $dbConnect = null) {
		return self::excute ( $sql, $types, $conditionArray, $dbConnect );
	}
	public static function update($sql, $types = null, $conditionArray = null, $dbConnect = null) {
		return self::excute ( $sql, $types, $conditionArray, $dbConnect );
	}
	
	/**
	 * 构建参数
	 *
	 * @param unknown $types        	
	 * @param unknown $array        	
	 * @return multitype:
	 */
	public static function buildParam($types, $array) {
		$params = array ();
		array_push ( $params, $types );
		foreach ( $array as $key => $value ) {
			array_push ( $params, $value );
		}
		return $params;
	}
	public static function refValues($array) {
		if (strnatcmp ( phpversion (), '5.3' ) >= 0) {
			// Reference is required for PHP 5.3+
			$refs = array ();
			foreach ( $array as $key => $value ) {
				$refs [$key] = &$array [$key];
			}
			return $refs;
		}
		return $array;
	}
	public static function fetchArray($result) {
		$array = array ();
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			$array [] = $row;
		}
		return $array;
	}
}

?>