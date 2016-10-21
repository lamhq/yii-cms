<?php
/**
 * Helper class to register css and js in application
 */
class AssetHelper
{
	static public function registerBootstrapTheme() {
		
	}

	static public function registerJquery() {
		$assetUrl = Yii::app()->assetManager->publish(VENDOR_PATH.'/bower/jquery/dist/jquery.min.js');
		$cs = Yii::app()->clientScript;
		$cs->scriptMap = [
			'jquery.js' => $assetUrl,
		];
		$cs->registerCoreScript('jquery');		
	}

	static public function registerBootstrap() {
		self::registerJquery();
		$assetUrl = Yii::app()->assetManager->publish(VENDOR_PATH.'/bower/bootstrap/dist');
		$cs = Yii::app()->clientScript;
		$cs->registerScriptFile($assetUrl.'/js/bootstrap.min.js');
		$cs->registerCssFile($assetUrl.'/css/bootstrap.min.css');
	}

	static public function registerAdminLte() {

	}
}