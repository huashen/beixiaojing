<?php
/*
*框架初始化
*/
define('ROOT',str_replace('\\','/',dirname(dirname(__FILE__))) . '/');
define('DEBUG',true);

include(ROOT . 'include/db.class.php');
include(ROOT . 'include/conf.class.php');

if(defined('DEBUG')) {
	error_reporting(E_ALL);
}else {
	error_reporting(0);
}
