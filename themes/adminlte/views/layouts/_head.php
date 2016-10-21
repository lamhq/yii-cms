<?php
$cs = Yii::app()->clientScript;

// jquery
$jquery = Yii::app()->assetManager->publish(VENDOR_DIR.'/bower-asset/admin-lte/plugins/jQuery');
$cs->scriptMap = array(
	'jquery.js' => $jquery.'/jQuery-2.1.4.min.js',
	'jquery.min.js' => $jquery.'/jQuery-2.1.4.min.js',
);
$cs->registerCoreScript('jquery');

// bootstrap
$bootstrap = Yii::app()->assetManager->publish(VENDOR_DIR.'/bower-asset/admin-lte/bootstrap');
$cs->registerCssFile($bootstrap . '/css/bootstrap.min.css');
$cs->registerScriptFile($bootstrap.'/js/bootstrap.min.js');

// adminlte theme
$adminlte = Yii::app()->assetManager->publish(VENDOR_DIR.'/bower-asset/admin-lte/dist');
$cs->registerCssFile($adminlte . '/css/AdminLTE.min.css');
$cs->registerCssFile($adminlte . '/css/skins/skin-purple.min.css');
$cs->registerScriptFile($adminlte.'/js/app.min.js');

// font awesome
$fontawesome= Yii::app()->assetManager->publish(VENDOR_DIR.'/bower-asset/font-awesome');
$cs->registerCssFile($fontawesome . '/css/font-awesome.min.css');

// custom
$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/custom.css');
$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/custom.js');
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= CHtml::encode($this->pageTitle.' - '.Yii::app()->params['title']) ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>