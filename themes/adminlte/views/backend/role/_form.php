<?php
/* @var $this RoleController */
/* @var $model Role */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScript('role-form', 'app.setupRoleForm()');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'auth-role-form',
	'enableClientValidation'=>true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name', ['class'=>'control-label col-sm-2']); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description', ['class'=>'control-label col-sm-2']); ?>
		<div class="col-sm-10">
			<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<div class="checkbox">
				<label><?php echo $form->checkBox($model,'isMaster'); ?> Have all permissions</label>
			</div>
			<?php echo $form->error($model,'isMaster'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<?php $this->widget('JsTreeWidget', [
				'model'=>$model,
				'attribute'=>'permissions',
				'permissionTree'=> AuthHelper::getPermissionTree()
			]) ?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class'=>'btn btn-primary']); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->