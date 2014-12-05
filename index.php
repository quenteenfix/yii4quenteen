<?php
//定义根目录:即 index.php 所在目录
define('DIR_ROOT', dirname(__FILE__) . '/');

//应用程序环境，可选：dev_main, main,
$ENV_NAME = 'dev_main';
$ENV_NAME = 'main';

define('APP_ENV', $ENV_NAME);

// change the following paths if necessary
if (APP_ENV == 'main') {
    error_reporting(E_ALL & ~E_NOTICE);

    //yii 源码所在位置，如需升级框架，直接覆盖此文件夹的代码
    $yii = DIR_ROOT . 'framework/yii/yii.php';

    // remove the following lines when in production mode
    defined('YII_DEBUG') or define('YII_DEBUG', true);

    // specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
} else {
    error_reporting(E_ALL & ~E_NOTICE);

    $yii = DIR_ROOT . 'framework/yii/yii.php';
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
}

//初始化框架的配置文件
$config = DIR_ROOT . 'framework/config/' . APP_ENV . '.php';

require_once($yii);

Yii::createWebApplication($config)->run();

