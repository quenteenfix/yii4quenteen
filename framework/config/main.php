<?php
/**
 * 网站配置文件
 * @author        qintao <11942518@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved.
 */
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('components', DIR_ROOT . 'framework/components/');

// This is the main Web application configuration.
// Any writable CWebApplication properties can be configured here.
return array(
	'basePath' => DIR_ROOT . '/bin',
	'name' => 'Quenteen',
	'language'=>'zh_cn',
	'theme'=>'default',
	'timeZone'=>'Asia/Shanghai',
    // preloading special component
	'preload' => array('init', 'fatalerrorcatch', 'log'),

    // autoloading model and component classes
	'import' => array(
		//'application.extensions.sys.*',//公用组件
		'components.sys.*',
		'components.third.*',
		'application.models.*',//公用模型
		'application.managers.*',//公用业务
		'application.managers.lib.*',
		'application.managers.util.*',
		'application.managers.data.*',
		'application.managers.service.*',
    ),

    'modules' => array(
        'main' => array(
            'defaultController' => 'index',
        ),
        'error' => array(),
        'user' => array(),//可以初始化public参数
        'login' => array(),),

	'defaultController' => 'main/index',

    // application components
	'components'=>array(
        'request' => array(
            'enableCsrfValidation' => true,
            'class' => 'components.sys.CsrfPassHttpRequest',
        ),
        'init' => array(
            //ext 别名：extensions
            //'class' => 'ext.sys.Init',
            'class' => 'components.sys.Init',
            'key' => 'test',
        ),
		'user' => array(
            // enable cookie-based authentication
			'allowAutoLogin' => true,
        ),

		'urlManager' => array(
			'urlFormat' => 'path',
            'showScriptName' => false,
			'rules' => array(
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        'db' => array(
            'class' => 'system.db.CDbConnection',
            'connectionString' => 'mysql:host=localhost;port=3306;dbname=direst_sale',
            'username' => 'root',
            'password' => 'ds_zhixi_121',
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'tablePrefix' => 'ds_',
        ),

        'session' => array(
            'class' => 'CDbHttpSession',
            'connectionID' => 'db',
            'sessionTableName' => 'yii_ds_session',
            'timeout' => 4 * 60 * 60,
            'autoStart' => true,
            'sessionName' => '',
        ),

        'fatalerrorcatch'=>array(
            'class'=>'components.sys.FatalErrorCatch',
        ),

        'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'error/error/error',
		),

		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
                array(
					'class'=>'CWebLogRoute',
                    //error, warning
					'levels'=>'error',
                ),
            ),
        ),
    ),

    // application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
    'params'=>array(
	),
);