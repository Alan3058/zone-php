<?php
// header ( "Content-Type:text/html; charset=utf-8" );
// require_once (PROJECTPATH."/include/config.php");
// require_once (PROJECTPATH."/include/MysqlUtil.class.php");
// require_once (PROJECTPATH."/include/Util.class.php");
// require_once (PROJECTPATH."/include/ResultInfo.class.php");
class ArticleAccessController {
	
	/**
	 * 保存文章访问记录
	 *
	 * @param string $types        	
	 * @param string $array        	
	 * @return Ambigous <boolean, unknown>
	 */
	public static function saveArticleClass($types, $array) {
		return DaoUtil::save("ARTICLE_ACCESS", $types, $array);
	}
}
?>

