<?php

// this contains the application parameters that can be maintained via GUI
return array(
	// this is displayed in the header section
	'title'=>'My Yii Blog',
	// this is used in error pages
	'adminEmail'=>'webmaster@example.com',
	// number of posts displayed per page
	'defaultPageSize'=>10,
	// the copyright information displayed in the footer section
	'copyrightInfo'=>'Copyright &copy; 2009 by My Company.',
	
	// permission tree
	'permissions'=>array(
		'system' => array(
			'manageUser'=>array(
				'viewUser',
				'createUser',
				'updateUser',
				'deleteUser',
			),
			'manageRole'=>array(
				'viewRole',
				'createRole',
				'updateRole',
				'deleteRole',
			),
			'managePermission',
			'manageConfiguration',
		),
	),
	
	// global access rule
	'accessRules'=>array(
		// guest
		array('allow',
			'controllers'=>array('backend/default'),
			'actions'=>array('login', 'logout', 'error'),
			'users'=>array('*'),
		),
		// logged user
		array('allow',
			'controllers'=>array('backend/default'),
			'actions'=>array('index'),
			'users'=>array('@'),
		),
		// manage user
		array('allow',
			'controllers'=>array('backend/user'),
			'actions'=>array('index', 'view'),
			'roles'=>array('viewUser'),
		),
		array('allow',
			'controllers'=>array('backend/user'),
			'actions'=>array('update'),
			'roles'=>array('updateUser'),
		),
		array('allow',
			'controllers'=>array('backend/user'),
			'actions'=>array('delete'),
			'roles'=>array('deleteUser'),
		),
		// manage role
		array('allow',
			'controllers'=>array('backend/role'),
			'actions'=>array('index', 'view'),
			'roles'=>array('viewRole'),
		),
		array('allow',
			'controllers'=>array('backend/role'),
			'actions'=>array('update'),
			'roles'=>array('updateRole'),
		),
		array('allow',
			'controllers'=>array('backend/role'),
			'actions'=>array('delete'),
			'roles'=>array('deleteRole'),
		),
		// permission
		array('allow',
			'controllers'=>array('backend/permission'),
			'actions'=>array('index'),
			'roles'=>array('managePermission'),
		),

		// deny all
		array('deny',  // deny all users
			'users'=>array('*'),
		),
	)
);
