<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('index')),
);
$this->pageTitle = sprintf('Update User "%s"', $model->username);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>