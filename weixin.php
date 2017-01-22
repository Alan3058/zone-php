<?php
require_once 'wx/WxArticleManager.class.php';
require_once 'autoLoad.php';

// define your token
define ( "TOKEN", "ctosbzone" );
$wechatObj = new wechatCallbackapiTest ();
if (isset ( $_GET ["echostr"] )) {
	$wechatObj->valid ();
} else {
	$wechatObj->responseMsg ();
}
class wechatCallbackapiTest {
	public function valid() {
		$echoStr = $_GET ["echostr"];
		
		// valid signature , option
		if ($this->checkSignature ()) {
			echo $echoStr;
			exit ();
		}
	}
	public function responseMsg() {
		// get post data, May be due to the different environments
		$postStr = $GLOBALS ["HTTP_RAW_POST_DATA"];
		
		// extract post data
		if (! empty ( $postStr )) {
			/*
			 * libxml_disable_entity_loader is to prevent XML eXternal Entity Injection, the best way is to check the validity of xml by yourself
			 */
			libxml_disable_entity_loader ( true );
			$postObj = simplexml_load_string ( $postStr, 'SimpleXMLElement', LIBXML_NOCDATA );
			$fromUsername = $postObj->FromUserName;
			$toUsername = $postObj->ToUserName;
			$msgType = $postObj->MsgType;
			if ($msgType == "text") {
				$keyword = trim ( $postObj->Content );
				switch ($keyword) {
					case "1" :
						$articles = array ();
						$articles [0] ["title"] = "ctosb技术交流区";
						$articles [0] ["description"] = "ctosb技术交流区旨在构建一个开放、自由、和平的社区，欢迎大家加入我们这个大家庭";
						$articles [0] ["picUrl"] = "http://ctosb.com/zone/img/head.jpg";
						$articles [0] ["url"] = "http://ctosb.com/zone/index.php";
						$resultStr = $this->reponseNews ( $fromUsername, $toUsername, $articles );
						echo $resultStr;
						break;
					case "2" :
						$articleArray = ArticleManager::getRecentArticleInfo ();
						$articles = array ();
						foreach ( $articleArray as $item ) {
							$article = array ();
							$article ["title"] = $item ["TITLE"];
							$article ["description"] = $item ["TITLE"];
							$article ["picUrl"] = "http://ctosb.com/zone/img/head.jpg";
							$article ["url"] = "http://ctosb.com/zone/index.php?p=article&i=" . $item ["ID"];
							array_push ( $articles, $article );
						}
						$resultStr = $this->reponseNews ( $fromUsername, $toUsername, $articles );
						echo $resultStr;
						break;
					default :
						$content = "输入对应数字,即可了解更多\r\n1.进入主页\r\n2.查看最近文章\r\n";
						$resultStr = $this->reponseTextMsg ( $fromUsername, $toUsername, $content );
						echo $resultStr;
				}
			} else {
				$event = $postObj->Event;
				$eventKey = $postObj->EventKey;
				if ($event == "CLICK" && $eventKey == "recentArticle") {
					$articleArray = ArticleManager::getRecentArticleInfo ();
					$articles = array ();
					foreach ( $articleArray as $item ) {
						$article = array ();
						$article ["title"] = $item ["TITLE"];
						$article ["description"] = $item ["TITLE"];
						$article ["picUrl"] = "http://ctosb.com/zone/img/head.jpg";
						$article ["url"] = "http://ctosb.com/zone/index.php?p=article&i=" . $item ["ID"];
						array_push ( $articles, $article );
					}
					$resultStr = $this->reponseNews ( $fromUsername, $toUsername, $articles );
					echo $resultStr;
				}
			}
		} else {
			echo "服务器未接收到数据";
			exit ();
		}
	}
	private function reponseTextMsg($toUsername, $fromUsername, $content) {
		$textTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Content><![CDATA[%s]]></Content>
						<FuncFlag>0</FuncFlag>
						</xml>";
		$result = sprintf ( $textTpl, $toUsername, $fromUsername, time (), "text", $content );
		return $result;
	}
	private function reponseNews($toUsername, $fromUsername, $articles) {
		$item = "<item>
				<Title><![CDATA[%s]]></Title>
				<Description><![CDATA[%s]]></Description>
				<PicUrl><![CDATA[%s]]></PicUrl>
				<Url><![CDATA[%s]]></Url>
				</item>";
		$tempStr = "";
		foreach ( $articles as $key => $value ) {
			$tempStr = $tempStr . sprintf ( $item, $value ["title"], $value ["description"], $value ["picUrl"], $value ["url"] );
		}
		$articleCount = count ( $articles );
		$template = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<ArticleCount>%s</ArticleCount>
						<Articles>%s</Articles>
						</xml>";
		
		$result = sprintf ( $template, $toUsername, $fromUsername, time (), "news", $articleCount, $tempStr );
		return $result;
	}
	
	// {
	// "button": [
	// {
	// "type": "click",
	// "name": "最新文章",
	// "key": "recentArticle"
	// },
	// {
	// "type": "view",
	// "name": "主页",
	// "url": "http://ctosb.com/zone"
	// },
	// {
	// "type": "view",
	// "name": "联系我们",
	// "url": "http://ctosb.com/zone/contactUs.php"
	// }
	// ]
	// }
	private function checkSignature() {
		// you must define TOKEN by yourself
		if (! defined ( "TOKEN" )) {
			throw new Exception ( 'TOKEN is not defined!' );
		}
		$signature = $_GET ["signature"];
		$timestamp = $_GET ["timestamp"];
		$nonce = $_GET ["nonce"];
		
		$token = TOKEN;
		$tmpArr = array (
				$token,
				$timestamp,
				$nonce 
		);
		// use SORT_STRING rule
		sort ( $tmpArr, SORT_STRING );
		$tmpStr = implode ( $tmpArr );
		$tmpStr = sha1 ( $tmpStr );
		
		if ($tmpStr == $signature) {
			return true;
		} else {
			return false;
		}
	}
}

?>