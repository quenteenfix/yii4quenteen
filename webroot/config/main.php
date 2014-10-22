<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Quenteen',

// preloading special component
	'preload' => array('init', 'log'),

// autoloading model and component classes

	'import' => array(
		'application.extensions.sys.*',//公用组件
		'application.components.base.*',
		'application.components.third.*',
		'application.models.*',//公用模型
		'application.managers.*',//公用业务
		'application.managers.lib.*',
		'application.managers.util.*',
		'application.managers.data.*',
),

    'modules' => array(
        'main' => array(
            'defaultController' => 'index',
        ),
        'user' => array(),//可以初始化public参数
        'login'
),

	'defaultController' => 'main/index',

// application components
	'components'=>array(
        'init' => array(
            'class' => 'ext.sys.Init',//ext 别名：extensions
            'key' => 'test',
        ),
		'user'=>array(
// enable cookie-based authentication
			'allowAutoLogin'=>true,
),

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => false,
			'rules'=>array(
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
),
),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
array(
					'class'=>'CWebLogRoute',
					'levels'=>'',//error, warning',
),
),
),
),
);