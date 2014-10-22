<?php
/**
 * 应用程序环境，可选：dev_main, main,
 */
$ENV_NAME = 'dev_main';
$ENV_NAME = 'main';

defined('APP_ENV') or define('APP_ENV', $ENV_NAME);

//定义根目录
define('DIR_ROOT', dirname(__FILE__) . '/');

// change the following paths if necessary
if (APP_ENV == 'main') {
    error_reporting(0);
    $yii = DIR_ROOT . 'webroot/framework/yii.php';
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
} else {
    $yii = DIR_ROOT . 'webroot/framework/yii.php';
    // remove the following lines when in production mode
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    // specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
}
$config = DIR_ROOT . 'webroot/config/' . APP_ENV . '.php';

require_once($yii);
Yii::setPathOfAlias('components', DIR_ROOT . 'webroot/components/');
Yii::createWebApplication($config)->run();

