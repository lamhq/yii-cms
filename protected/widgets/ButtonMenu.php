<?php
/**
 * Button menu in backend
 *
 * @author Lam Huynh
 */
class ButtonMenu extends CWidget {
	
	public $items=array();
	
	/**
	 * @inheritdoc
	 */
	public function run()
	{
		$buttons = '';
		foreach($this->items as $item) {
			if ( isset($item['permission']) 
				&& !Yii::app()->user->checkAccess($item['permission']) )
				continue;
			
			$label = $item['label'];
			if ( isset($item['icon']) ) {
				$label = '<i class="'.$item['icon'].'"></i> ' . $label;
			}
			$class = 'btn '. (isset($item['class']) ? $item['class'] : 'btn-default');
			$buttons .= ' '.CHtml::link($item['label'], $item['url'], ['class'=>$class]);
		}
		echo $buttons ? CHtml::tag('p', ['class'=>''], $buttons, true) : '';
	}

}
