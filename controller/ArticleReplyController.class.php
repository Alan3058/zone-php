<?php
header ( "Content-Type:text/html; charset=utf-8" );
// require_once (PROJECTPATH . "/include/config.php");
// require_once (PROJECTPATH . "/include/MysqlUtil.class.php");
// require_once (PROJECTPATH . "/include/Util.class.php");
// require_once (PROJECTPATH . "/include/MysqlUtil.class.php");
// require_once (PROJECTPATH . "/include/ResultInfo.class.php");
class ArticleReplyController {
	/**
	 * 查询文章回复（通过文章id）
	 * @param unknown $sql
	 * @param string $types
	 * @param string $array
	 * @return Ambigous <multitype:boolean , multitype:unknown , boolean, unknown>
	 */
	public static function getArticleReplyByArticleId($sql, $types = null, $array = null) {
		$sql = "select AR.* from ARTICLE_REPLY AR WHERE AR.ARTICLE_ID = ?";
		$articleReplies = DaoUtil::query ( $sql, "i", array (
				"ID" => $_GET ["i"] 
		) );
		return $articleReplies;
	}
	
	/**
	 * 保存文章回复
	 *
	 * @param unknown $types        	
	 * @param unknown $array        	
	 * @return Ambigous <boolean, unknown>
	 */
	public static function saveArticleReply($types, $array) {
		return DaoUtil::save("ARTICLE_REPLY", $types, $array);
	}
}
?>

