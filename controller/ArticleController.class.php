<?php
header ( "Content-Type:text/html; charset=utf-8" );
// require_once (PROJECTPATH . "/include/config.php");
// require_once (PROJECTPATH . "/include/MysqlUtil.class.php");
// require_once (PROJECTPATH . "/include/DaoUtil.class.php");
// require_once (PROJECTPATH . "/include/MysqlUtil.class.php");
// require_once (PROJECTPATH . "/include/ResultInfo.class.php");
class ArticleController {
	public static function getArticleInfoByArticleId($id) {
		// 查询文章
		$sql = "select ART.*,AC.CLASS_NAME from ARTICLE ART
		LEFT JOIN ARTICLE_CLASS AC ON ART.CLASS_ID = AC.ID WHERE ART.ID = ?";
		$articles = DaoUtil::query ( $sql, "i", array (
				"ID" => $id 
		) );
		return $articles;
	}
	public static function getPublicArticleInfo() {
		// 查询文章
		$sql = "SELECT ART.*,AC.CLASS_NAME from ARTICLE ART
		LEFT JOIN ARTICLE_CLASS AC ON ART.CLASS_ID = AC.ID WHERE ART.IS_PUBLIC=1 ORDER BY ART.CREATE_TIME desc LIMIT 10";
		$articles = DaoUtil::query ( $sql );
		return $articles;
	}
	public static function getArticleInfo() {
		// 查询文章
		$sql = "SELECT ART.*,AC.CLASS_NAME from ARTICLE ART
		LEFT JOIN ARTICLE_CLASS AC ON ART.CLASS_ID = AC.ID WHERE 1=1 ORDER BY ART.CREATE_TIME desc LIMIT 10";
		$articles = DaoUtil::query ( $sql );
		return $articles;
	}
	public static function getArticleInfoByClassId($id) {
		// 查询文章
		$sql = "select ART.*,AC.CLASS_NAME from ARTICLE ART
		LEFT JOIN ARTICLE_CLASS AC ON ART.CLASS_ID = AC.ID WHERE ART.CLASS_ID = ? ORDER BY ART.CREATE_TIME desc LIMIT 10";
		$articles = DaoUtil::query ( $sql, "i", array (
				"CLASS_ID" => $id 
		) );
		return $articles;
	}
	public static function getPublicArticleInfoByClassId($id) {
		// 查询文章
		$sql = "select ART.*,AC.CLASS_NAME from ARTICLE ART
		LEFT JOIN ARTICLE_CLASS AC ON ART.CLASS_ID = AC.ID WHERE ART.IS_PUBLIC=1 AND ART.CLASS_ID = ? ORDER BY ART.CREATE_TIME desc LIMIT 10";
		$articles = DaoUtil::query ( $sql, "i", array (
				"CLASS_ID" => $id 
		) );
		return $articles;
	}
	
	/**
	 * 保存文章
	 *
	 * @param unknown $types        	
	 * @param unknown $array        	
	 * @return multitype:boolean multitype:
	 */
	public static function saveArticle($types, $array) {
		return DaoUtil::save("ARTICLE", $types, $array);
	}
	/**
	 * 更新文章
	 *
	 * @param unknown $types        	
	 * @param unknown $result        	
	 * @param unknown $condition        	
	 * @return multitype:boolean multitype:
	 */
	public static function updateArticle($types, $result, $condition) {
		return DaoUtil::update("ARTICLE", $types, $result, $condition);
	}
}
?>

