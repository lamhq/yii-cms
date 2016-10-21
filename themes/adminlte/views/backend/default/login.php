<?php
/* @var $this BackendController */
$this->layout= '//layouts/blank';
$this->pageTitle= 'Login - '.Yii::app()->name;
$this->bodyClass .= ' login-page';

$icheck = Yii::app()->assetManager->publish(VENDOR_DIR.'/bower-asset/admin-lte/plugins/iCheck');
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($icheck.'/icheck.min.js');
$cs->registerCssFile($icheck . '/square/blue.css');
$cs->registerScript('iCheck', "
$(function () {
	$('input').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%' // optional
	});
});
");

?>
<div class="login-box">
	<div class="login-logo"> <?= CHtml::encode(Yii::app()->name) ?> </div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableAjaxValidation'=>true,
		)); ?>
			<div class="form-group has-feedback">
				<?= $form->textField($model,'username', [
					'class'=>'form-control', 'placeholder'=>'Email']); ?>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span> 
				<?= $form->error($model,'username') ?>
			</div>
			<div class="form-group has-feedback">
				<?= $form->passwordField($model,'password', [
					'class'=>'form-control', 'placeholder'=>'Password']); ?>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span> 
				<?= $form->error($model,'password') ?>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label><?= $form->checkBox($model,'rememberMe'); ?> Remember Me </label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
				<!-- /.col -->
			</div>
		<?php $this->endWidget(); ?>
		<div class="social-auth-links text-center">
			<p>- OR -</p> <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a> <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a> </div>
		<!-- /.social-auth-links --><a href="#">I forgot my password</a>
		<br> <a href="register.html" class="text-center">Register a new membership</a> </div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
