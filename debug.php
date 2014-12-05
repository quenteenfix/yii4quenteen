<?php
/**
 * 应用程序环境，可选：dev_main, main,
 */
$ENV_NAME = 'main';
$ENV_NAME = 'dev_main';

echo '222';
exit;

defined('APP_ENV') or define('APP_ENV', $ENV_NAME);

// change the following paths if necessary
if (APP_ENV == 'main') {
    error_reporting(0);
    $yii = dirname(__FILE__) . '/webroot/framework/yiilite.php';
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',1);
} else {
    $yii=dirname(__FILE__) . '/webroot/framework/yii.php';
    // remove the following lines when in production mode
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    // specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
}
$config = dirname(__FILE__) . '/webroot/config/' . APP_ENV . '.php';

require_once($yii);
Yii::createWebApplication($config)->run();

