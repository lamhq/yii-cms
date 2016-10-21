<?php
Yii::import('zii.widgets.CMenu');

/**
 * Sidebar menu in backend
 *
 * @author Lam Huynh
 */
class SidebarMenu extends CMenu {
	
	/**
	 * @inheritdoc
	 */
	public function init()
	{
		$this->htmlOptions['class'] = 'sidebar-menu';
		$this->linkLabelWrapper = 'span';
		$this->submenuHtmlOptions = array('class'=>'treeview-menu');
		$this->decorateItemsRecursively($this->items);
		parent::init();
	}
	
	protected function decorateItemsRecursively(&$items) {
		foreach($items as &$item) {
			$visible = isset($item['permission'])
				? Yii::app()->user->checkAccess($item['permission'])
				: true;
			$item['visible'] = $visible;
			$options=isset($item['itemOptions']) ? $item['itemOptions'] : array();
			$options['class'] = 'treeview';
			$item['itemOptions'] = $options;
			if ( isset($item['items']) ) {
				$this->decorateItemsRecursively($item['items']);
			}
		}
		
	}
	
	/**
	 * @inheritdoc
	 */
	protected function renderMenuItem($item)
	{
		if(!isset($item['url'])) {
			$item['url'] = 'javascript:void(0)';
		}
		$label=$this->linkLabelWrapper===null ? $item['label'] : CHtml::tag($this->linkLabelWrapper, $this->linkLabelWrapperHtmlOptions, $item['label']);
		if (!isset($item['icon'])) {
			$item['icon'] = 'fa fa-circle-o';
		}
		$icon = $item['icon'];
		$label = '<i class="'.$icon.'"></i>' . $label;
		
		if (isset($item['items']) && count($item['items'])) {
			$label .= '<i class="fa fa-angle-left pull-right"></i>';
		}
		$result = CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array());
		return $result;
	}
}
