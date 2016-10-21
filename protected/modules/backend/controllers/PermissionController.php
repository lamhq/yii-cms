<?php

class PermissionController extends BackendController
{
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->request->isPostRequest) {
			AuthHelper::syncPermissions(Yii::app()->params['permissions']);
			Yii::app()->user->setFlash('success', 'Permission reseted. Now you should check database to change permission label');
		}

		$this->render('index',array(
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Role the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Role::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Role $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='auth-role-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
