<?php
header ( "Content-Type:text/html; charset=utf-8" );
// 获取文件名称
$fileName = (! isset ( $_GET ["p"] ) || $_GET ["p"] == "" ? "index" : $_GET ["p"]);
define ( "PROJECTPATH", dirname ( __FILE__ ) );

include (PROJECTPATH . '/autoLoad.php');
?>
<?php print PageUtil::getHeader ();?>
<?php print PageUtil::getNavbar ();?>
<?php include 'content/' . $fileName . '.php';?>
<div style="position: fixed;right: 0px;bottom: 0px;z-index: 1024;background:#f1f1f1">
<h4 style="text-align:center">微信关注</h4>
<img alt="微信关注" width="128" height="128" src="img/qrcode.jpg">
</div>
<script>
	window._bd_share_config = {
		common : {
			bdMini:1,
			bdMiniList:['weixin','qzone','tsina','tqq','renren']
		},
		share : [{
			"bdSize" : 16
		}],
		slide : [{	   
			bdImg : 8,
			bdPos : "right",
			bdTop : 200
		}]
	}
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
<?php print PageUtil::getFooter();?>
