<?php

/**
 * @author Lam Huynh
 */
class BackendController extends BaseController {

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/main',
	 * See 'themes/adminlte/views/layouts/main.php'.
	 */
	public $layout='//layouts/main';
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return Yii::app()->params['accessRules'];
	}}
