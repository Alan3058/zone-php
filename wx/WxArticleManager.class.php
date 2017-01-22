<?php
class ArticleManager {
	public static function getRecentArticleInfo($num = 4) {
		// 查询文章
		$sql = "select ART.*,AC.CLASS_NAME from ARTICLE ART
		LEFT JOIN ARTICLE_CLASS AC ON ART.CLASS_ID = AC.ID WHERE AC.ID!=1 AND ART.IS_PUBLIC=1 ORDER BY CREATE_TIME DESC LIMIT 4";
		return DaoUtil::query($sql);
	}
}
?>
