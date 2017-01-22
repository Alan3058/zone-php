<?php
// header ( "Content-Type:text/html; charset=utf-8" );
// require_once (PROJECTPATH."/include/config.php");
// require_once (PROJECTPATH."/include/MysqlUtil.class.php");
// require_once (PROJECTPATH."/include/Util.class.php");
// require_once (PROJECTPATH."/include/ResultInfo.class.php");
class ArticleClassController {
	
	public static function getArticleClass(){
		$sql = "select * from ARTICLE_CLASS WHERE 1=1";
		$resultArray= DaoUtil::query($sql);
		return $resultArray;
	}
	
	/**
	 * 删除文章类别
	 *
	 * @param string $types        	
	 * @param string $array        	
	 * @return Ambigous <boolean, unknown>
	 */
	public static function deleteArticleClass($types, $array) {
		$sql = Util::buildDeleteSql ( "ARTICLE_CLASS", $array );
		return MysqlUtil::delete ( $sql, $types, $array );
	}
	/**
	 * 保存文章类别
	 *
	 * @param string $types        	
	 * @param string $array        	
	 * @return Ambigous <boolean, unknown>
	 */
	public static function saveArticleClass($types, $array) {
		return DaoUtil::save("ARTICLE_CLASS", $types, $array);
	}
	/**
	 * 更新文章类别
	 * @param unknown $types
	 * @param unknown $result
	 * @param unknown $condition
	 * @return Ambigous <multitype:boolean , boolean, unknown>
	 */
	public static function updateArticleClass($types, $result, $condition) {
		return DaoUtil::update("ARTICLE_CLASS", $types, $result, $condition);
	}
}
?>

