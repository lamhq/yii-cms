<?php

/**
 * Description of PermissionTreeWidget
 *
 * @author Lam Huynh
 */
class JsTreeWidget extends CInputWidget {
	
	public $treeId;
	
	public $permissionTree;
	
	public function run() {
		list($name, $id) = $this->resolveNameID();
		if (isset($this->htmlOptions['id']))
			$id = $this->htmlOptions['id'];
		else
			$this->htmlOptions['id'] = $id;
		if (isset($this->htmlOptions['name']))
			$name = $this->htmlOptions['name'];

		$this->registerClientScript();
		$this->render('js-tree-widget');
	}

	/**
	 * Registers the needed CSS and JavaScript.
	 */
	public function registerClientScript() {
		$jstree = Yii::app()->assetManager->publish(VENDOR_DIR . '/bower-asset/jstree/dist');
		$cs = Yii::app()->clientScript;
		$cs->registerCssFile($jstree . '/themes/default/style.min.css');
		$cs->registerScriptFile($jstree . '/jstree.min.js');
		
		$model = $this->model;
		$attribute = $this->attribute;
		$treeJson = json_encode( self::convertPermissionTreeToJson($this->permissionTree, 
			json_decode($model->$attribute, true)) );
		$this->treeId = 'tree'.time().rand(0, 9);
		$cs->registerScript('jstree-'.$this->id, "app.setupPermissionTree('{$this->treeId}', $treeJson);");
	}

	static protected function convertPermissionTreeToJson($permissions, $selecteds) {
		$items = array();
		foreach ($permissions as $k => $v) {
			$permission = is_array($v) ? $k : $v;
			$childs = is_array($v) ? $v : array();
			$checked = in_array($permission, $selecteds);
			$authItem = Yii::app()->authManager->getAuthItem($permission);
			
			$item = array(
				'id' => $permission,
				'icon' => false,
				'text'=>$authItem->description,
				'state'=>array(
					'selected' => $checked,
					'opened' => $checked
				),
			);
			$childItems = self::convertPermissionTreeToJson($childs, $selecteds);
			if ($childItems) {
				foreach ($childItems as $c) {
					if ($c['state']['opened'])
						$item['state']['opened'] = true;
				}
				$item['children'] = $childItems;
			}
			$items[] = $item;
		}
		return $items;
	}
}
