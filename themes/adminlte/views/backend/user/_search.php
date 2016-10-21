<?php
/* @var $this UserController */
/* @var $model UserBackendForm */
/* @var $form CActiveForm */
?>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username', ['class'=>'control-label col-sm-3']); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128
				,'class'=>'form-control')); ?>
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
			<?php echo $form->dropdownList($model,'status',$model->getStatusList(), array(
				'class'=>'form-control', 'empty'=>'-- All --')); ?>
			<?php echo $form->error($model,'status'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
			<button class="btn btn-primary" type="submit">Search</button>
		</div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->