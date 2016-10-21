<?php
/* @var $this JsTreeWidget */
?>
<div class="tree-checkbox form-control">
	<?php
	if ($this->hasModel())
		echo CHtml::activeHiddenField($this->model, $this->attribute, $this->htmlOptions);
	else
		echo CHtml::hiddenField($name, $this->value, $this->htmlOptions);
	?>
	<div id="<?= $this->treeId ?>"></div>
</div>
