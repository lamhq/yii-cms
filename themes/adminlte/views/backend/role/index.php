<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Manage Role'
);

$this->menu=array(
	array('label'=>'Create Role', 'url'=>array('create'), 'permission'=>'creareRole'),
);

$this->pageTitle = 'Manage Role';
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#auth-role-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'auth-role-grid',
	'dataProvider'=>$model->search(),
	'cssFile'=>false,
	'itemsCssClass'=>'table table-striped table-bordered',
	'pagerCssClass'=>'pag-container',
	'pager' => array(
		'header'=>'',
		'cssFile' => false,
		'nextPageLabel' => 'Next',
		'prevPageLabel' => 'Previous',
		'firstPageLabel' => 'First',
		'lastPageLabel' => 'Last',
		'selectedPageCssClass'=>'active',
		'maxButtonCount' => 10,
		'htmlOptions'=>array('class' => 'pagination pull-right',)
	),
	'columns'=>array(
		'name',
		'description',
		'isMaster',
		array(
			'header'=>'Actions',
			'class'=>'CButtonColumn',
			'template'=>'{update} {delete}',
			'buttons' => array(
				'update' => array('visible'=>'Yii::app()->user->checkAccess("updateRole")'),
				'delete' => array('visible'=>'Yii::app()->user->checkAccess("deleteRole")'),
			)
		),
	),
)); ?>
</div>