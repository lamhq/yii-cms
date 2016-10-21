<?php
/* @var $this UserController */
/* @var $model UserBackendForm */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableClientValidation'=>true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username', ['class'=>'control-label col-sm-3']); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128
				,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'inputPassword', ['class'=>'control-label col-sm-3']); ?>
		<div class="col-sm-9">
			<?php echo $form->passwordField($model,'inputPassword',array('size'=>60,'maxlength'=>128
				,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'inputPassword'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'confirmPassword', ['class'=>'control-label col-sm-3']); ?>
		<div class="col-sm-9">
			<?php echo $form->passwordField($model,'confirmPassword',array('size'=>60,'maxlength'=>128
				,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'confirmPassword'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email', ['class'=>'control-label col-sm-3']); ?>
		<div class="col-sm-9">
			<?php echo $form->emailField($model,'email',array('size'=>60,'maxlength'=>128
				,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status', ['class'=>'control-label col-sm-3']); ?>
		<div class="col-sm-9">
			<?php echo $form->dropdownList($model,'status',$model->getStatusList(), array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'status'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'role', ['class'=>'control-label col-sm-3']); ?>
		<div class="col-sm-9">
			<?php echo $form->dropdownList($model,'role', Role::getListData(), array('class'=>'form-control', 'empty'=>'- Select -')); ?>
			<?php echo $form->error($model,'role'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
			<button class="btn btn-primary" type="submit"><?= $model->isNewRecord ? 'Create' : 'Save' ?></button>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->