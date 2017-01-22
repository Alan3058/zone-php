<?php
header ( "Content-Type:text/html; charset=utf-8" );
class Util {
	
	/**
	 * 构建预处理insert sql
	 *
	 * @param unknown $tableName        	
	 * @param unknown $array        	
	 * @return string
	 */
	public static function buildInsertSql($tableName, $array) {
		$fieldNameList = $fieldValueList = "";
		foreach ( $array as $key => $value ) {
			$fieldNameList .= $key . ",";
			$fieldValueList .= "?,";
		}
		$fieldNameList = substr ( $fieldNameList, 0, strlen ( $fieldNameList ) - 1 );
		$fieldValueList = substr ( $fieldValueList, 0, strlen ( $fieldValueList ) - 1 );
		return "INSERT INTO " . $tableName . " (" . $fieldNameList . ")VALUES(" . $fieldValueList . ")";
	}
	/**
	 * 构建预处理batch insert sql
	 *
	 * @param unknown $tableName        	
	 * @param unknown $array        	
	 * @return string
	 */
	public static function buildBatchInsertSql($tableName, $array) {
		$fieldNameList = $fieldValueList = "";
		foreach ( $array as $key => $values ) {
			$fieldNameList .= $key . ",";
			foreach ( $values as $value ) {
				$fieldValueList .= "?,";
			}
			$fieldValueList = "(" . substr ( $fieldValueList, 0, strlen ( $fieldValueList ) - 1 ) . ")";
		}
		$fieldNameList = substr ( $fieldNameList, 0, strlen ( $fieldNameList ) - 1 );
		return "INSERT INTO " . $tableName . " (" . $fieldNameList . ")VALUES " . $fieldValueList;
	}
	/**
	 * 构建预处理DELETE sql
	 *
	 * @param unknown $tableName        	
	 * @param unknown $result        	
	 * @param unknown $condition        	
	 * @return string
	 */
	public static function buildDeleteSql($tableName, $condition) {
		$conditionList = "";
		foreach ( $condition as $key => $value ) {
			$conditionList .= $key . "= ? AND ";
		}
		$conditionList = substr ( $conditionList, 0, strlen ( $conditionList ) - 4 );
		
		return "DELETE FROM " . $tableName . " WHERE " . $conditionList;
	}
	/**
	 * 构建预处理update sql
	 *
	 * @param unknown $tableName        	
	 * @param unknown $result        	
	 * @param unknown $condition        	
	 * @return string
	 */
	public static function buildUpdateSql($tableName, $result, $condition) {
		$conditionList = $resultList = "";
		foreach ( $result as $key => $value ) {
			$resultList .= $key . "= ? , ";
		}
		foreach ( $condition as $key => $value ) {
			$conditionList .= $key . "= ? AND ";
		}
		$resultList = substr ( $resultList, 0, strlen ( $resultList ) - 2 );
		$conditionList = substr ( $conditionList, 0, strlen ( $conditionList ) - 4 );
		
		return "UPDATE " . $tableName . " SET " . $resultList . " WHERE " . $conditionList;
	}
	/**
	 * 跳转Url
	 *
	 * @param unknown $url        	
	 */
	public static function redirect2Url($url, $time = 0, $content = "") {
		echo "<html>";
		echo "<head>";
		echo "<meta http-equiv='refresh' content=" . $time . ";url=" . $url . ">";
		echo "</head>";
		echo "<body>";
		echo "<h3 style='text-align:center'>" . $content . "</h3>";
		echo "</body>";
		echo "</html>";
	}
	
	/**
	 * 过滤输入信息
	 *
	 * @param unknown $data        	
	 * @return string
	 */
	public static function filterInputInfo($data) {
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data );
		return $data;
	}
	/**
	 * 截取字符串（默认截取前200个）
	 *
	 * @param unknown $content        	
	 * @param number $fm        	
	 * @param number $to        	
	 * @param string $encoding        	
	 * @return string
	 */
	public static function substring($content, $fm = 0, $to = 200, $encoding = "utf-8") {
		return mb_substr ( $content, $fm, $to, $encoding );
	}
}
?>

