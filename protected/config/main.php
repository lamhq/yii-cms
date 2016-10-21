<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Yii CMS',
	// preloading 'log' component
	'preload' => array('log'),
	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.widgets.*',
	),
	'defaultController' => 'post',
	'modules' => array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => '123123',
			'generatorPaths'=>array(
                'application.gii',   // a path alias
            ),
		),
		'backend' => array(
			
		),
	),
	// application components
	'components' => array(
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=cms',
			'username' => 'root',
			'password' => '',
			'tablePrefix' => 'cms_',
			'emulatePrepare' => true,
			'charset' => 'utf8',
		),
		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
			'itemTable'=>'{{auth_item}}',
			'itemChildTable'=>'{{auth_item_child}}',
			'assignmentTable'=>'{{auth_assignment}}',
		),
		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(
				'post/<id:\d+>/<title:.*?>' => 'post/view',
				'posts/<tag:.*?>' => 'post/index',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
		),
		'format'=>array(
			'class' => 'BaseFormatter',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
//				array(
//					'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//					'ipFilters' => array('::1', '127.0.0.1', '192.168.1.105'),
//				),
			// uncomment the following to show log messages on web pages
			/*
			  array(
			  'class'=>'CWebLogRoute',
			  ),
			 */
			),
		),
		'clientScript' => array(
			'coreScriptPosition' => CClientScript::POS_END,
			'defaultScriptFilePosition' => CClientScript::POS_END,
		)
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => require(dirname(__FILE__) . '/params.php'),
);
