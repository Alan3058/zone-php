<?php
define ( "PROJECTPATH", dirname ( __FILE__ ) );
require_once PROJECTPATH . '/include/ValidateCode.class.php';
require_once PROJECTPATH . '/include/SessionUtil.class.php';
//验证码类

$validateCode = new ValidateCode();
//生成图片
$validateCode->makeImage();
//验证码信息保存到session中
SessionUtil::saveSession("verification", md5($validateCode->getCode()));
?>