<?php
$this->pageTitle='Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="error-page">
	<h2 class="headline text-red"><?php echo $code; ?></h2>
	<div class="error-content">
		<h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>
		<p><?php echo CHtml::encode($message); ?></p>
		<p>You may <a href="<?= $this->createUrl('/backend/default') ?>">return to dashboard</a> and try again.</p>
	</div>
</div>
