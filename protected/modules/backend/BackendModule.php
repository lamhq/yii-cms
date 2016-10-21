<?php

class BackendModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		Yii::import('backend.widgets.*');
		
		Yii::app()->theme = 'adminlte';
		Yii::app()->user->loginUrl = array('/backend/default/login');
		Yii::app()->errorHandler->errorAction = '/backend/default/error';
		$this->setImport(array(
			'backend.models.*',
			'backend.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
