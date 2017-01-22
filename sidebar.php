<?php
// header ( "Content-Type:text/html; charset=utf-8" );
require_once (PROJECTPATH."/include/ArticleClass.class.php");

// 查询文章分类
$sql = "select * from ARTICLE_CLASS WHERE 1=1";
$articleClasses = ArticleClass::queryArticleClass ( $sql );

?>
<div class="col-sm-3 col-sm-offset-1 sidebar">
	<div class="widget">
		<h3>文章分类</h3>
		<ul class="nav">
			<?php while ( $row = mysqli_fetch_assoc ( $articleClasses ) ) { ?>
			<li><a
				href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?p=articleByClass&i=".$row["ID"] ?>"><?php echo $row ["CLASS_NAME"] ?></a></li>
			<?php }?>
		</ul>
	</div>
</div>