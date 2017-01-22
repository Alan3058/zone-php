<?php
require_once 'autoLoad.php';

print PageUtil::getHeader ();
print PageUtil::getNavbar ();
?>
<div class="container">
	<div class="row">
		<h2>友情链接</h2>
		<ul class="list-unstyled">
			<li><a href="http://www.baidu.com">百度</a></li>
			<li><a href="http://v3.bootcss.com">bootstrap3</a></li>
			<li><a href="http://www.w3school.com.cn">w3school</a></li>
			<li><a href="http://www.apache.org">apache</a></li>
		</ul>
	</div>
</div>
<?php print PageUtil::getFooter();?>