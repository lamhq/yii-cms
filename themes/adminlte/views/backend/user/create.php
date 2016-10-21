<?php
/* @var $this UserController */
/* @var $model User */
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage', 'url'=>array('index'), 'permission'=>['viewUser']),
);

$this->pageTitle = 'Create User';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>