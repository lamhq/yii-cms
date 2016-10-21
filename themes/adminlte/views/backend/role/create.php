<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Manage Role'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Role', 'url'=>array('index'), 'permission'=>'viewRole'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>