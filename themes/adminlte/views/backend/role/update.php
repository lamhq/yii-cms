<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Manage ROle'=>array('index'),
	'Update role '. $model->name,
);

$this->menu=array(
	array('label'=>'Manage Role', 'url'=>array('index'), 'permission'=>'viewRole'),
	array('label'=>'Create Role', 'url'=>array('create'), 'permission'=>'createRole'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>