<?php
header ( "Content-Type:text/html; charset=utf-8" );
class DaoUtil {
	/**
	 * 查询
	 *
	 * @param unknown $types        	
	 * @param unknown $array        	
	 * @return multitype:boolean multitype:
	 */
	public static function query($sql, $types = null, $array = null) {
		$result = MysqlUtil::query ( $sql, $types, $array );
		if (is_bool($result)) {
			return $result;
		}
		return MysqlUtil::fetchArray ( $result );
	}
	
	/**
	 * 保存
	 *
	 * @param unknown $tableName        	
	 * @param unknown $types        	
	 * @param unknown $array        	
	 * @return multitype:boolean multitype:
	 */
	public static function save($tableName, $types, $array) {
		$sql = Util::buildInsertSql ( $tableName, $array );
		return MysqlUtil::insert ( $sql, $types, $array );
	}
	/**
	 * 更新文章
	 *
	 * @param unknown $tableName        	
	 * @param unknown $types        	
	 * @param unknown $result        	
	 * @param unknown $condition        	
	 * @return multitype:boolean multitype:
	 */
	public static function update($tableName, $types, $result, $condition) {
		// 构建sql
		$sql = Util::buildUpdateSql ( $tableName, $result, $condition );
		$array = array_merge ( $result, $condition );
		return MysqlUtil::update ( $sql, $types, $array );
	}
	/**
	 * 删除
	 *
	 * @param string $tableName        	
	 * @param string $types        	
	 * @param string $array        	
	 * @return Ambigous <boolean, unknown>
	 */
	public static function delete($tableName, $types, $array) {
		$sql = Util::buildDeleteSql ( $tableName, $array );
		return MysqlUtil::delete ( $sql, $types, $array );
	}
}
?>

