<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii-1.1.15/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
define('VENDOR_PATH',__DIR__ . '/vendor');

require(__DIR__ . '/vendor/autoload.php');
require_once($yii);
Yii::createWebApplication($config)->run();
