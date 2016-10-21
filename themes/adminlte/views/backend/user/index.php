<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create', 'url'=>array('create'), 'permission'=>'createUser'),
	array('label'=>'Search', 'url'=>'javascript:void(0)', 'linkOptions'=>['class'=>'btn btn-info search-button']),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->pageTitle = 'Manage User';
?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
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
		array(
			'header' => 'S/N',
			'type' => 'raw',
			'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
			'headerHtmlOptions' => array('width' => '30px', 'style' => 'text-align:center;'),
			'htmlOptions' => array('style' => 'text-align:center;')
		),
		'username',
		'email',
		array(
			'type' => 'enum',
			'value' => 'array($data->status, "user_status")',
			'header' => 'Status',
		),
		'role',
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

